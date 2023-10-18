<?php

namespace App\Services\AlphaVantage;

use Illuminate\Support\Facades\Http;

class AlphaVantageService implements AlphaVantageServiceInterface
{

    public function getStockPriceForSymbol(string $symbol): mixed
    {
        try {
            $response = Http::get(env('ALPHA_VANTAGE_URL'), [
                'function' => 'GLOBAL_QUOTE',
                'symbol' => $symbol,
                'apikey' => env('ALPHA_VANTAGE_API_KEY')
            ]);
            $decodedResponse = json_decode($response->body(), true);
            if (!isset($decodedResponse['Global Quote'])) {
                $message = data_get($decodedResponse, 'Note');
                info("Stock price fetch for stock $symbol failed with reason $message.");
                return null;
            }
            return $decodedResponse;
        } catch (\Exception $e) {
            $message = $e->getMessage();
            info("Stock price fetch for stock $symbol failed with reason $message.");
            return null;
        }
    }
}
