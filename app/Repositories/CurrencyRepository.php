<?php

namespace App\Repositories;

use App\Interfaces\CurrencyRepositoryInterface;
use App\Models\Currency;
use Illuminate\Database\Eloquent\Collection;

class CurrencyRepository implements CurrencyRepositoryInterface
{
    public function getCurrencyById(int $id): Currency
    {
        return Currency::findOrFail($id);
    }
    public function getPaymentCurrency(): Currency
    {
        return Currency::first();
    }

    public function getPurchasedCurrencies(): Collection
    {
        return Currency::skip(1)->take(3)->get();
    }
}
