<?php

namespace App\Services\StockPrice;

use App\Models\Stock;

interface StockPriceServiceInterface
{
    public function asyncUpdateStockPrices();

    public function updateStockPrice(Stock $stock);
}
