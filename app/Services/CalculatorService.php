<?php

namespace App\Services;

use App\Interfaces\CalculatorServiceInterface;
use App\Models\Currency;

class CalculatorService implements CalculatorServiceInterface
{
    /**
     * @param ExchangeRateService $exchangeRateService
     * @param SurchargeService $surchargeService
     */
    public function __construct(
        private readonly ExchangeRateService $exchangeRateService,
        private readonly SurchargeService $surchargeService
    ) {
    }

    /**
     * @param float $amount
     * @param Currency $currency
     * @return float
     */
    public function calculate(float $amount, Currency $currency): float
    {
        $exchangeRateAmount = $this->exchangeRateService->calculate(
            $amount,
            $currency
        );

        return round($exchangeRateAmount + $this->surchargeService->calculate(
                $exchangeRateAmount,
                $currency
            ), 2);
    }
}
