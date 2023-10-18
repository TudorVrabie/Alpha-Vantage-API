<?php

namespace App\Services\Stock;

use App\Models\Stock;

interface StockServiceInterface
{
    public function show(Stock $stock);

}
