<?php

namespace App\Services\StockPrice;

use App\Jobs\UpdateStockPriceJob;
use App\Models\Stock;
use App\Repositories\Price\PriceRepositoryInterface;
use App\Repositories\Stock\StockRepositoryInterface;
use App\Services\AlphaVantage\AlphaVantageServiceInterface;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;

class StockPriceService implements StockPriceServiceInterface
{

    public function __construct(public StockRepositoryInterface     $stockRepository,
                                public PriceRepositoryInterface     $priceRepository,
                                public AlphaVantageServiceInterface $alphaVantageService
    )
    {

    }

    public function asyncUpdateStockPrices(): void
    {
        $stocks = $this->stockRepository->index();
        foreach ($stocks as $stock) {
            dispatch(new UpdateStockPriceJob($stock));
        }
    }

    public function updateStockPrice(Stock $stock): void
    {
        if ($response = $this->alphaVantageService->getStockPriceForSymbol($stock->symbol)) {
            try {
                $updatedPrice = data_get($response, ['Global Quote', '05. price']);
                $this->priceRepository->store([
                    'stock_id' => $stock->id,
                    'value' => $updatedPrice,
                    'created_at' => Carbon::now()->format('Y-m-d H:i')
                ]);
                Cache::forget("$stock->symbol-price");
            } catch (\Exception $exception) {
                $message = $exception->getMessage();
                info("Token price store failed for $stock->symbol with message $message.");
            }
        }
    }
}
