<?php

namespace App\Services;

use App\Interfaces\CalculatorServiceInterface;
use App\Models\Currency;

class SurchargeService implements CalculatorServiceInterface
{
    /**
     * @param float $amount
     * @param Currency $currency
     * @return float
     */
    public function calculate(float $amount, Currency $currency): float
    {
        return round($amount * ($currency->surcharge->percentage / 100), 6);
    }
}
