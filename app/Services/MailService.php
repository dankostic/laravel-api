<?php

namespace App\Services;

use App\Interfaces\ExtraActionInterface;
use App\Models\Currency;
use Illuminate\Http\Request;

class MailService implements ExtraActionInterface
{

    public function format(Request $request, Currency $currency)
    {
        return 'Email is sent';
    }
}
