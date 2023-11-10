<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Cache;
use Spatie\Image\Exceptions\InvalidManipulation;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\MediaCollections\Models\Media;


class Stylist extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = [
        'first_name',
        'last_name',
        'phone',
        'email',
        'address',
        'specialization_id',
    ];

    public function getNameAttribute(): string
    {
        return 'St - ' . $this->first_name . ' ' . $this->last_name;
    }

    /**
     * @throws InvalidManipulation
     */
    public function registerMediaCollections(Media $media = null): void
    {
        $this->addMediaCollection('stylist_image')
            ->useFallbackUrl(asset('assets/default/1.png'))
            ->useDisk('stylist_image')
            ->singleFile()
            ->acceptsMimeTypes(['image/jpeg', 'image/png', 'image/webp', 'image/svg', 'image/jpg']);

        $this
            ->addMediaConversion('home_preview')
            ->fit(Manipulations::FIT_FILL_MAX, 300, 300)
            ->nonQueued();

    }

    public function specialization(): BelongsTo
    {
        return $this->belongsTo(Specialization::class);
    }


    public function services(): BelongsToMany
    {
        return $this->belongsToMany(Service::class);
    }

    public function appointments(): HasMany
    {
        return $this->hasMany(Appointment::class);
    }

    // Observer
    protected static function boot()
    {
        parent::boot();

        static::saved(function ($stylist) {
//            if (request()->hasFile('image')) {
//                $stylist->addMediaFromRequest('image')->toMediaCollection('stylist_image');
//            }

            Cache::forget('stylists');

        });

        static::deleted(function ($stylist) {
//            $stylist->appointments()->delete();
            Cache::forget('stylists');
        });
    }
}
