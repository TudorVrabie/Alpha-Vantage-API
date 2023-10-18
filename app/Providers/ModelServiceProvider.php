<?php

namespace App\Providers;

use App\Services\AlphaVantage\AlphaVantageService;
use App\Services\AlphaVantage\AlphaVantageServiceInterface;
use App\Services\Stock\StockService;
use App\Services\Stock\StockServiceInterface;
use App\Services\StockPrice\StockPriceService;
use App\Services\StockPrice\StockPriceServiceInterface;
use Illuminate\Support\ServiceProvider;

class ModelServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(
            StockPriceServiceInterface::class,
            StockPriceService::class
        );
        $this->app->singleton(
            AlphaVantageServiceInterface::class,
            AlphaVantageService::class
        );
        $this->app->singleton(
            StockServiceInterface::class,
            StockService::class
        );
    }
}
