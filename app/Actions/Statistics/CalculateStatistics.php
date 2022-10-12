<?php

namespace App\Actions\Statistics;

use App\Enums\StatisticsType;
use Illuminate\Support\Collection;

class CalculateStatistics
{

    public function __invoke(StatisticsType $statisticsType = null): Collection
    {

        $statisticsData = collect();

        if ($statisticsType) {
            $statisticsData->push([
                'name' => $statisticsType->name,
                'data' => $statisticsType->execute()
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
