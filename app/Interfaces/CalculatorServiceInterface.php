<?php

namespace App\Interfaces;

use App\Models\Currency;

interface CalculatorServiceInterface
{
    public function calculate(float $amount, Currency $currency): float;
}
