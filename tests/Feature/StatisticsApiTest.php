<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Enums\StatisticsType;
use Illuminate\Testing\Fluent\AssertableJson;
use Illuminate\Foundation\Testing\RefreshDatabase;

class StatisticsApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_getting_list_of_statistics(): void
    {

        $response = $this->get('/statistics');

        $response->assertStatus(200);

        $this->assertEquals(count($response->json()['items']), count(StatisticsType::cases()));
    }

    public function test_getting_single_statistics(): void
    {

        $type = 'average_price_of_an_item';
        $response = $this->get('/statistics?type=' . $type);

        $response->assertStatus(200);

        $this->assertEquals(count($response->json()['items']), 1);

        $this->assertSame(StatisticsType::from($type), StatisticsType::from($response->json()['items'][0]['name']));
    }
}
