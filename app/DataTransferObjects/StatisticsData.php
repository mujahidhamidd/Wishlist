<?php

namespace App\DataTransferObjects;

use App\Enums\StatisticsType;

class StatisticsData
{
    public function __construct(
        public readonly ?StatisticsType $type
    ) {
    }
}
