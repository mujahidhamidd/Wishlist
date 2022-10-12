<?php

namespace App\Actions\Statistics;

use App\Enums\StatisticsType;
use Illuminate\Support\Collection;
use App\DataTransferObjects\StatisticsData;

class CalculateStatistics
{

    public function __invoke(StatisticsData $statisticsDto = null): Collection
    {

        $statisticsData = collect();

        if ($statisticsDto->type) {
            $statisticsData->push([
                'name' => $statisticsDto->type->name,
                'data' => $statisticsDto->type->execute()
            ]);
            return  $statisticsData;
        }

        $allStatistics = StatisticsType::cases();

        foreach ($allStatistics as $statistics) {
            $statisticsData->push([
                'name' => $statistics->name,
                'data' => $statistics->execute()
            ]);
        }

        return  $statisticsData;
    }
}
