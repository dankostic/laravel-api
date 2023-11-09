<?php

namespace App\Services;

use App\Interfaces\CalculatorServiceInterface;
use App\Interfaces\DiscountInterface;
use App\Interfaces\ExtraActionInterface;
use App\Models\Currency;
use Illuminate\Http\Request;

class DiscountService implements CalculatorServiceInterface, ExtraActionInterface, DiscountInterface
{
    /**
     * @param float $amount
     * @param Currency $currency
     * @return float
     */
    public function calculate(float $amount, Currency $currency): float
    {
        return round(($currency->discount->percentage / 100) * $amount, 6);
    }

    /**
     * @param Request $request
     * @param Currency $currency
     * @return float
     */
    public function format(Request $request, Currency $currency): float
    {
        return $this->calculate($request->calculatorAmount, $currency);
    }

    /**
     * @param Currency $currency
     * @return float|null
     */
    public function percentage(Currency $currency): ?float
    {
        return $currency->discount->percentage;
    }
}
