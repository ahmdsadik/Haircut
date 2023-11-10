<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Facades\Cache;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Image\Manipulations;


class Service extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = [
        'name',
        'description',
        'duration',
        'price',
        'is_published',
    ];

    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('service_image')
            ->singleFile()
            ->useFallbackUrl(asset('assets/1.png'))
            ->acceptsMimeTypes(['image/jpeg', 'image/png', 'image/webp', 'image/svg', 'image/jpg'])
            ->useDisk('service_image');
    }

    public function stylists(): BelongsToMany
    {
        return $this->belongsToMany(Stylist::class);
    }


    protected static function boot()
    {
        parent::boot();

        static::saved(function ($service) {

            Cache::forget('services');

        });

        static::deleted(function ($service) {
            Cache::forget('services');
        });
    }
}
