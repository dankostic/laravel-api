<?php

namespace App\Services;

use App\Interfaces\CalculatorServiceInterface;
use App\Interfaces\ExchangeRateServiceInterface;
use App\Models\Currency;

class ExchangeRateService implements CalculatorServiceInterface
{
    private const USD_EXCHANGE_RATE = 1.0;

    /**
     * @param float $amount
     * @param Currency $currency
     * @return float
     */
    public function calculate(float $amount, Currency $currency): float
    {
        return round(self::USD_EXCHANGE_RATE * $amount/$currency->exchangeRate->rate, 2);
    }
}
