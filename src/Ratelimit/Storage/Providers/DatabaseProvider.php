<?php

declare(strict_types=1);

namespace CQ\Ratelimit\Storage\Providers;

use CQ\Ratelimit\Storage\StorageProvider;

final class DatabaseProvider extends StorageProvider
{
    public function __construct(
        private $db
    ) {
    }

    public function createEntry(string $key, int $resetAt): array
    {
        [$identifier] = explode(
            ':',
            string: $key,
        );

        $this->db::delete(
            table: 'cq_ratelimit',
            where: ['key[~]' => $identifier.'%']
        );

        return $this->db::create(
            table: 'cq_ratelimit',
            data: [
                'key' => $key,
                'current' => 0,
                'reset_at' => $resetAt,
            ]
        );
    }

    public function getEntry(string $key): array | null
    {
        return $this->db::get(
            table: 'cq_ratelimit',
            columns: [
                'current [Int]',
                'reset_at [Int]',
            ],
            where: ['key' => $key]
        );
    }

    public function increaseEntry(string $key): void
    {
        $this->db::update(
            table: 'cq_ratelimit',
            data: ['current[+]' => 1],
            where: ['key' => $key]
        );
    }
}
