<?php

namespace App\Interfaces;

use App\Models\Currency;

interface DiscountInterface
{
    /**
     * @param Currency $currency
     * @return float|null
     */
    public function percentage(Currency $currency): ?float;
}
