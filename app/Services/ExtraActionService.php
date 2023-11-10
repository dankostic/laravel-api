<?php

namespace App\Services;

use App\Http\Factories\ExtraActionFactory;
use App\Interfaces\ExtraActionInterface;
use App\Models\Order;

class ExtraActionService
{
    /**
     * @param Order $order
     * @return ExtraActionInterface|null
     */
    public function setAction(Order $order): ?ExtraActionInterface
    {
        return (new ExtraActionFactory())
            ->getCurrency($order->currencyPurchased->code)
            ->format($order);
    }
}
