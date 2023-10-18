<?php

namespace App\Services\Stock;

use App\Models\Stock;
use App\Repositories\Stock\StockRepositoryInterface;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redis;

class StockService implements StockServiceInterface
{
    public function __construct(public StockRepositoryInterface $stockRepository)
    {
    }

    public function show(Stock $stock)
    {
        return Cache::lock("$stock->symbol-price")->block(10, function () use ($stock) {
            return cache()->remember(
                key: "$stock->symbol-price",
                ttl: now()->addMinutes(1),
                callback: function () use ($stock) {
                    return $stock->price()->orderBy('created_at', 'desc')->first();
                },
            );
        });
    }
}
