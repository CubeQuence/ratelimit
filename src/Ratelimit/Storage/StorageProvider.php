<?php

declare(strict_types=1);

namespace CQ\Ratelimit\Storage;

abstract class StorageProvider
{
    abstract public function createEntry(string $key, int $resetAt): array;

    abstract public function getEntry(string $key): array;

    abstract public function increaseEntry(string $key): void;
}
