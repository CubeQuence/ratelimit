<?php

declare(strict_types=1);

namespace CQ\Ratelimit\Models;

final class StatusModel
{
    private bool $success;
    private int $remainingAttempts;

    public function __construct(
        int $current,
        private int $limit,
        private int $resetAt
    ) {
        $this->success = $current <= $limit;
        $this->limit = $limit;
        $this->remainingAttempts = max(0, $limit - $current);
    }

    public function limitExceeded(): bool
    {
        return ! $this->success;
    }

    public function getLimit(): int
    {
        return $this->limit;
    }

    public function getRemainingAttempts(): int
    {
        return $this->remainingAttempts;
    }

    public function getResetAt(): int
    {
        return $this->resetAt;
    }
}
