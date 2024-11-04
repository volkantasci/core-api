<?php

namespace Fleetbase\Traits;

use Illuminate\Support\Facades\Cache;

trait ClearsCacheOnModelEvents
{
    public static function bootClearsCacheOnModelEvents(): void
    {
        // Model oluşturulduğunda tüm cache'i temizle
        static::created(function ($model) {
            Cache::flush();
        });

        // Model güncellendiğinde tüm cache'i temizle
        static::updated(function ($model) {
            Cache::flush();
        });

        // Model silindiğinde tüm cache'i temizle
        static::deleted(function ($model) {
            Cache::flush();
        });

        // Model geri yüklendiğinde tüm cache'i temizle (soft delete için)
        if (method_exists(static::class, 'restored')) {
            static::restored(function ($model) {
                Cache::flush();
            });
        }
    }
}
