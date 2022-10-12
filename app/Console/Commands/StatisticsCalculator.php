<?php

namespace App\Console\Commands;

use App\Enums\StatisticsType;
use Illuminate\Console\Command;
use App\DataTransferObjects\StatisticsData;
use App\Actions\Statistics\CalculateStatistics;

class StatisticsCalculator extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'statistics:generate {--type=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'this command is responsible of getting statistics about items';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(public CalculateStatistics  $calculateStatistics)
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $statisticsData = new StatisticsData(StatisticsType::tryFrom($this->option('type')));
        $statisticsData = ($this->calculateStatistics)($statisticsData);
        // output for terminal
        $statisticsData->each(
            fn ($statistics) =>  $this->info($statistics['name'] . ' : ' . $statistics['data'])
        );
    }
}
