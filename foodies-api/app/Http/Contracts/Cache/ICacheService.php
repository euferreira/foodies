<?php

namespace App\Http\Contracts\Cache;

interface ICacheService
{
    public function get(string $key): ?string;

    public function set(string $key, string $value, int $ttl = null): bool;

    public function delete(string $key): bool;
}
