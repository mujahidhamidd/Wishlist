<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class StatisticsCommandTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_all_statistics_console_command()
    {
        $this->artisan('statistics:generate')
            ->assertExitCode(0);
    }

    public function test_single_statistics_console_command()
    {
        $this->artisan('statistics:generate --type=average_price_of_an_item')
            ->assertExitCode(0);
    }
}
