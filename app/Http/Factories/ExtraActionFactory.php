<?php

namespace App\Http\Factories;

use App\Interfaces\ExtraActionInterface;
use App\Models\Order;
use App\Services\MailService;

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
            default => new self,
        };
    }

    /**
     * @param Order $order
     * @return void
     */
    public function format(Order $order): void {}
}
