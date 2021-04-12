<?php

declare(strict_types=1);

use CQ\Providers\RatelimitProvider;
use CQ\Ratelimit\Models\RateModel;
use CQ\Ratelimit\Ratelimit;

// TODO: set link where file can be found
$databaseProvider = new RatelimitProvider();
$rateLimiter = new Ratelimit(
    storageProvider: $databaseProvider
);

$identifier = '192.168.1.2';

$status = $rateLimiter->limit(
    identifier: $identifier,
    rate: RateModel::perMinute(100)
);

echo json_encode([
    'limitExceeded' => $status->limitExceeded(),
    'getLimit' => $status->getLimit(),
    'getRemainingAttempts' => $status->getRemainingAttempts(),
    'getResetAt' => $status->getResetAt(),
]);
