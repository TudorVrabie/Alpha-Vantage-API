<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use App\Services\Stock\StockServiceInterface;

class StockController extends Controller
{
    public function __construct(public StockServiceInterface $stockService)
    {
    }

    public function show(Stock $stock)
    {
        return response()->json(
            $this->stockService->show($stock)
        );
    }
}
