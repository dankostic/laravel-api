<?php

namespace App\Services;

use App\Models\ExchangeRate;
use Illuminate\Support\Facades\Http;

class ForeignExchangeService
{
    /**
     * @return void
     */
    public function update(): void
    {
        $response = Http::get('http://apilayer.net/api/live?access_key=8448e2d2c03c8075b52b04bcb5c02ec8&currencies=EUR,GBP,JPY&source=USD&format=1');
        $rawResponse = $response->json();

        foreach ($rawResponse['quotes'] as $code => $rate) {
            ExchangeRate::leftJoin('currencies', function($join) {
                $join->on('currencies.id', 'exchange_rates.currency_purchased_id');
            })->where('currencies.code', str_replace($rawResponse['source'], '', $code))->update(['rate' => $rate]);
        }
    }
}
