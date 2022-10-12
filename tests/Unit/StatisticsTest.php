<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Item;
use App\Actions\Statistics\TotalItemsCountAction;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Actions\Statistics\ActionAveragePriceOfItem;
use App\Actions\Statistics\ActionTotalPriceofItemsAdded;
use App\Actions\Statistics\ActionWebsiteWithTheHighestTotal;

class StatisticsTest extends TestCase
{
    use RefreshDatabase;


    public function test_total_items_count(): void
    {

        $items = Item::factory()->zid()->count(100)->create();

        $action = app()->make(TotalItemsCountAction::class);

        $this->assertEquals(($action)(), count($items));
    }

    public function test_average_price_of_an_item(): void
    {

        $items = Item::factory()->zid()->count(100)->create();
        $action = app()->make(ActionAveragePriceOfItem::class);
        $this->assertEquals(($action)(), $items->sum('price') / count($items));
    }

    public function test_the_website_with_the_highest_total_price_of_its_items(): void
    {

        Item::factory()->zid()->count(100)->create();

        Item::factory()->amazon()->count(1)->create();

        $action = app()->make(ActionWebsiteWithTheHighestTotal::class);

        $this->assertEquals(($action)(), 'zid.store');
    }


    public function test_total_price_of_items_added_this_month(): void
    {

        $items = Item::factory()->zid()->count(100)->create();

        $action = app()->make(ActionTotalPriceofItemsAdded::class);

        $this->assertEquals(($action)(),  $items->sum('price'));
    }
}
