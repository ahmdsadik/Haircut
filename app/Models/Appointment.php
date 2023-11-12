<?php

namespace App\Models;

use App\Enums\AppointmentStatus;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Cache;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_name',
        'phone',
        'stylist_id',
        'service_id',
        'appointment_at',
        'status',
    ];

    protected $casts = [
        'appointment_at' => 'datetime',
        'status' => AppointmentStatus::class,
    ];

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }

    public function stylist(): BelongsTo
    {
        return $this->belongsTo(Stylist::class);
    }

    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class);
    }

    public function scopeGetTotalCount()
    {
        return Cache::rememberForever('appointments_count', function () {
            return self::count();
        });
    }

//    public function scopeGetTotalCountByStatus($status)
//    {
//        return Cache::rememberForever('appointments_count_by_status_' . $status, function () use ($status) {
//            return $this->where('status', $status)->count();
//        });
//    }
//
//    public function scopeGetTotalCountByStylist($stylist_id)
//    {
//        return Cache::rememberForever('appointments_count_by_stylist_' . $stylist_id, function () use ($stylist_id) {
//            return $this->where('stylist_id', $stylist_id)->count();
//        });
//    }

    protected static function boot()
    {
        parent::boot();
        static::saved(function ($appointment) {
            Cache::forget('appointments_count');
//            Cache::forget('appointments_count_by_status_' . $appointment->status->value);
//            Cache::forget('appointments_count_by_stylist_' . $appointment->stylist_id);
        });


        static::deleted(function ($appointment) {
            Cache::forget('appointments_count');
//            Cache::forget('appointments_count_by_status_' . $appointment->status->value);
//            Cache::forget('appointments_count_by_stylist_' . $appointment->stylist_id);
        });
    }
}
