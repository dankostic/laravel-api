<?php

namespace App\Http\Factories;

use App\Interfaces\ExtraActionInterface;
use App\Models\Currency;
use App\Services\DiscountService;
use App\Services\MailService;
use Illuminate\Http\Request;

class ExtraActionFactory implements ExtraActionInterface
{
    /**
     * @param string $code
     * @return ExtraActionInterface
     */
    public function getCurrency(string $code): ExtraActionInterface
    {
        return match ($code) {
            'GBP' => new MailService(),
            'EUR' => new DiscountService(),
            default => new self,
        };
    }

    /**
     * @param Request $request
     * @param Currency $currency
     * @return null
     */
    public function format(Request $request, Currency $currency)
    {
        return null;
    }
}
