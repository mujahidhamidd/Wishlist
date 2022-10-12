<?php

namespace App\Enums;

use App\Actions\Statistics\TotalItemsCountAction;
use App\Actions\Statistics\ActionAveragePriceOfItem;
use App\Actions\Statistics\ActionTotalPriceofItemsAdded;
use App\Actions\Statistics\ActionWebsiteWithTheHighestTotal;

enum StatisticsType
{
    case total_items_count;
    case average_price_of_an_item;
    case the_website_with_the_highest_total_price;
    case total_price_of_items_added_this_month;


    public function execute()
    {
        return match ($this) {
            StatisticsType::total_items_count => app()->make(TotalItemsCountAction::class)(),
            StatisticsType::average_price_of_an_item => app()->make(ActionAveragePriceOfItem::class)(),
            StatisticsType::the_website_with_the_highest_total_price => app()->make(ActionWebsiteWithTheHighestTotal::class)(),
            StatisticsType::total_price_of_items_added_this_month => app()->make(ActionTotalPriceofItemsAdded::class)()
        };
    }
}
