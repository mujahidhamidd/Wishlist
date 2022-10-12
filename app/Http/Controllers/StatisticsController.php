<?php

namespace App\Http\Controllers;

use App\Enums\StatisticsType;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\StatisticsRequest;
use App\DataTransferObjects\StatisticsData;
use App\Actions\Statistics\CalculateStatistics;

class StatisticsController extends Controller
{


    public function __construct(public CalculateStatistics  $calculateStatistics)
    {
    }



    public function index(StatisticsRequest $request)
    {
        $statisticsData = new StatisticsData(StatisticsType::tryFrom($request->type));
        return JsonResponse::create(['items' => ($this->calculateStatistics)($statisticsData)]);
    }
}
