<?php

namespace Fleetbase\Traits;

use Illuminate\Database\Eloquent\Model;

/**
 * Bu trait artık cache kullanmıyor, sadece direkt model attribute'larını dönüyor
 */
trait HasCacheableAttributes
{
    /**
     * Direkt olarak model attribute'unu döndür
     */
    public static function attributeFromCache(Model $target, string $key, $default = null, ?int $ttl = null)
    {
        return data_get($target, $key, $default);
    }

    /**
     * Direkt olarak model attribute'unu döndür
     */
    public function fromCache($key, $default = null, $ttl = null)
    {
        return data_get($this, $key, $default);
    }

    /**
     * Direkt olarak model attribute'unu döndür
     */
    public function rememberAttribute($key, $default = null, $ttl = null)
    {
        return data_get($this, $key, $default);
    }

    /**
     * Direkt olarak model attribute'unu döndür
     */
    public function rememberAttributeForever($key, $default = null)
    {
        return data_get($this, $key, $default);
    }

    /**
     * Cache artık kullanılmadığı için boş method
     */
    public function forgetAttribute(string $attribute): bool
    {
        return true;
    }

    /**
     * Cache artık kullanılmadığı için boş method
     */
    public function flushAttributesCache(): bool
    {
        return true;
    }
}
