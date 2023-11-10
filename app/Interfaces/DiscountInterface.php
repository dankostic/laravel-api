<?php

namespace App\Interfaces;

use App\Models\Currency;
use Illuminate\Http\Request;

interface DiscountInterface
{
    /**
     * @param Currency $currency
     * @return float|null
     */
    public function percentage(Currency $currency): ?float;

    /**
     * @param Request $request
     * @param Currency $currency
     * @return float|null
     */
    public function amount(Request $request, Currency $currency): ?float;
}
