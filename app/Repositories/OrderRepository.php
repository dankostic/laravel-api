<?php

namespace App\Repositories;

use App\Http\Factories\ExtraActionFactory;
use App\Http\Factories\DiscountPercentageFactory;
use App\Interfaces\OrderRepositoryInterface;
use App\Models\Currency;
use App\Models\Order;
use App\Services\DiscountService;
use App\Services\ExchangeRateService;
use App\Services\ExtraActionService;
use App\Services\SurchargeService;
use Illuminate\Http\Request;

class OrderRepository implements OrderRepositoryInterface
{
    public function __construct(
        private readonly ExchangeRateService $exchangeRateService,
        private readonly SurchargeService $surchargeService,
        private readonly DiscountService $discountService
    ) {
    }

    public function store(Request $request, Currency $currency)
    {
        $orderService = new ExtraActionService($request, $currency);
        $factory = (new DiscountPercentageFactory())
            ->getCurrency($currency->code)
            ->percentage($currency);

        Order::insert(
            [
                'currency_id' => $request->paymentCurrencyId,
                'currency_purchased_id' => $currency->id,
                'surcharges_id' => $currency->surcharge->id,
                'amount_of_surcharge' => $this->surchargeService->calculate(
                    $this->exchangeRateService->calculate($request->amount, $currency),
                    $currency
                ),
                'amount_of_currency_purchased' => $request->amount,
                'amount_paid_in_dollars' => $request->calculatorAmount,
                'discount_percentage' => $factory,
                'discount_amount' => $orderService(),
                'created' => date("Y-m-d")
            ]
        );
    }
}
