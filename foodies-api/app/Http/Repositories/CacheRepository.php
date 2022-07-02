<?php

namespace App\Http\Repositories;

use App\Http\Contracts\Cache\ICacheRepository;
use Predis\Client;

class CacheRepository implements ICacheRepository
{
    private Client $redis;

    public function __construct()
    {
        $this->redis = new Client();
    }

    public function get(string $key): ?string
    {
        return $this->redis->get($key);
    }

    public function set(string $key, string $value, int $ttl = null): bool
    {
        $result = $this->redis->set($key, $value);
        if ($ttl) {
            $this->redis->expire($key, $ttl);
        }
        return $result ? true : false;
    }

    public function delete(string $key): bool
    {
        $result = $this->redis->del($key);
        return $result === 1;
    }

    public function clear(): bool
    {
        // TODO: Implement clear() method.
    }

    public function has(string $key): bool
    {
        // TODO: Implement clear() method.
    }
}
