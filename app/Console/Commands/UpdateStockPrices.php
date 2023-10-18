<?php

namespace App\Console\Commands;

use App\Services\StockPrice\StockPriceServiceInterface;
use Illuminate\Console\Command;

class UpdateStockPrices extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update-stock-prices';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Updates the stock prices';

    /**
     * Execute the console command.
     */
    public function handle(StockPriceServiceInterface $stockPriceService)
    {
        $stockPriceService->asyncUpdateStockPrices();
    }
}
