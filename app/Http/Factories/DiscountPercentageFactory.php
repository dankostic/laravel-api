<?php

namespace App\Http\Factories;

use App\Interfaces\DiscountInterface;
use App\Models\Currency;
use App\Services\DiscountService;
use Illuminate\Http\Request;

class DiscountPercentageFactory implements DiscountInterface
{
    /**
     * @param string $code
     * @return DiscountInterface
     */
    public function getCurrency(string $code): DiscountInterface
    {
        return match ($code) {
            'EUR' => new DiscountService(),
            default => new self
        };
    }

    /**
     * @param Currency $currency
     * @return float|null
     */
    public function percentage(Currency $currency): ?float
    {
        return null;
    }

    /**
     * @param Currency $currency
     * @return float|null
     */
    public function amount(Request $request, Currency $currency): ?float
    {
        return null;
    }
}
