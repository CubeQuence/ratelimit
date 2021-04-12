<?php

declare(strict_types=1);

namespace CQ\RateLimit\Models;

final class RateModel
{
    private function __construct(
        private int $operations,
        private int $interval
    ) {
    }

    public static function perSecond(int $operations)
    {
        return new static($operations, 1);
    }

    public static function perMinute(int $operations)
    {
        return new static($operations, 60);
    }

    public static function perHour(int $operations)
    {
        return new static($operations, 3600);
    }

    public static function perDay(int $operations)
    {
        return new static($operations, 86400);
    }

    public static function custom(int $operations, int $interval)
    {
        return new static($operations, $interval);
    }

    public function getOperations(): int
    {
        return $this->operations;
    }

    public function getInterval(): int
    {
        return $this->interval;
    }
}
