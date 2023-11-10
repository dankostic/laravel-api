<?php

namespace App\Repositories;

use App\Http\Factories\DiscountPercentageFactory;
use App\Interfaces\OrderRepositoryInterface;
use App\Models\Currency;
use App\Models\Order;
use App\Services\DiscountService;
use App\Services\ExchangeRateService;
use App\Services\ExtraActionService;
use App\Services\SurchargeService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class OrderRepository implements OrderRepositoryInterface
{
    public function __construct(
        private readonly ExchangeRateService $exchangeRateService,
        private readonly SurchargeService $surchargeService,
        private readonly DiscountService $discountService,
        private readonly ExtraActionService $extraActionService
    ) {
    }

    public function store(Request $request, Currency $currency): Order
    {
        $order = Order::create(
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
                'discount_percentage' => (new DiscountPercentageFactory())
                    ->getCurrency($currency->code)
                    ->percentage($currency),
                'discount_amount' => (new DiscountPercentageFactory())
                    ->getCurrency($currency->code)
                    ->amount($request, $currency),
                'created' => date("Y-m-d")
            ]
        );
        // dd($order->currency->name, $order->currencyPurchased->name, $order->surcharge->percentage, $order->discount->percentage);
        $this->extraActionService->setAction($order);

        return $order;
    }
}
