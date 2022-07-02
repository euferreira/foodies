<?php

namespace App\Http\Contracts\Cache;

interface ICacheRepository
{
    public function get(string $key): ?string;

    public function set(string $key, string $value, int $ttl = null): bool;

    public function delete(string $key): bool;

    public function clear(): bool;

    public function has(string $key): bool;
}
