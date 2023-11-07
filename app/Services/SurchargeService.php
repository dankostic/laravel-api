<?php

namespace App\Services;

use App\Interfaces\CalculatorServiceInterface;
use App\Models\Currency;

class SurchargeService implements CalculatorServiceInterface
{
    /**
     * @param int $amount
     * @param Currency $currency
     * @return float
     */
    public function calculate(int $amount, Currency $currency): float
    {
        return round($amount *  ($currency->surcharge->percentage / 100), 2);
    }
}
