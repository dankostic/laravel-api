<?php

namespace App\Interfaces;

use App\Models\Currency;

interface CalculatorServiceInterface
{
    public function calculate(int $amount, Currency $currency): float;
}
