<?php

namespace App\Services\AlphaVantage;

interface AlphaVantageServiceInterface
{
    public function getStockPriceForSymbol(string $symbol);
}
