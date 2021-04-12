<?php

declare(strict_types=1);

namespace CQ\Ratelimit;

use CQ\Ratelimit\Models\RateModel;
use CQ\Ratelimit\Models\StatusModel;
use CQ\Ratelimit\Storage\StorageProvider;

final class Ratelimit
{
    public function __construct(
        private StorageProvider $storageProvider
    ) {
    }

    public function limit(string $identifier, RateModel $rate): StatusModel
    {
        $key = $this->key(
            identifier: $identifier,
            interval: $rate->getInterval()
        );

        $hit = $this->hit($key, $rate);

        return new StatusModel(
            current: $hit['current'],
            limit: $rate->getOperations(),
            resetAt: $hit['reset_at']
        );
    }

    private function key(string $identifier, int $interval): string
    {
        $identifier = base64_encode($identifier);

        return "${identifier}:${interval}:" . floor(time() / $interval);
    }

    private function hit(string $key, RateModel $rate): array
    {
        $entry = $this->storageProvider->getEntry(key: $key);

        if (! $entry) {
            $entry = $this->storageProvider->createEntry(
                key: $key,
                resetAt: time() + $rate->getInterval()
            );
        }

        if ($entry['current'] <= $rate->getOperations()) {
            // TODO: check if returns correct data
            $entry = $this->storageProvider->increaseEntry(key: $key);
        }

        return $entry;
    }
}
