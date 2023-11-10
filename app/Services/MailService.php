<?php

namespace App\Services;

use App\Interfaces\ExtraActionInterface;
use App\Mail\OrderDetails;
use App\Models\Order;
use Illuminate\Support\Facades\Mail;

class MailService implements ExtraActionInterface
{
    /**
     * @param Order $order
     * @return void
     */
    public function format(Order $order): void
    {
        Mail::to('info@menu.app')->send(
            new OrderDetails($order)
        );
    }
}
