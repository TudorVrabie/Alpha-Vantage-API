<?php

namespace App\Jobs;

use App\Models\Stock;
use App\Services\StockPrice\StockPriceService;
use App\Services\StockPrice\StockPriceServiceInterface;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class UpdateStockPriceJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(public Stock $stock)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(StockPriceServiceInterface $stockPriceService): void
    {
        $stockPriceService->updateStockPrice($this->stock);
    }
}
