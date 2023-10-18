<?php

namespace App\Providers;

use App\Repositories\Price\PriceRepository;
use App\Repositories\Price\PriceRepositoryInterface;
use App\Repositories\Stock\StockRepository;
use App\Repositories\Stock\StockRepositoryInterface;
use Carbon\Laravel\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(
            StockRepositoryInterface::class,
            StockRepository::class
        );
        $this->app->singleton(
            PriceRepositoryInterface::class,
            PriceRepository::class
        );
    }
}
