<?php

namespace App\Interfaces;

use App\Models\Order;

interface ExtraActionInterface
{
    /**
     * @param Order $order
     * @return void
     */
    public function format(Order $order): void;
}
