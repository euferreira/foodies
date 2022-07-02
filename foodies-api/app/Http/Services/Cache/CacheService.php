<?php

namespace App\Http\Services\Cache;

use App\Http\Contracts\Cache\ICacheRepository;

class CacheService implements \App\Http\Contracts\Cache\ICacheService
{
    protected ICacheRepository $cacheRepository;

    public function __construct(ICacheRepository $cacheRepository)
    {
        $this->cacheRepository = $cacheRepository;
    }

    public function get(string $key): ?string
    {
        return $this->cacheRepository->get($key);
    }

    public function set(string $key, string $value, int $ttl = null): bool
    {
        return $this->cacheRepository->set($key, $value, $ttl);
    }

    public function delete(string $key): bool
    {
        return $this->cacheRepository->delete($key);
    }
}
