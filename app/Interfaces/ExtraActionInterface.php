<?php

namespace App\Interfaces;

use App\Models\Currency;
use Illuminate\Http\Request;

interface ExtraActionInterface
{
    public function format(Request $request, Currency $currency);
}
