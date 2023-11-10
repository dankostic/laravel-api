<?php

namespace App\Interfaces;

use App\Models\Currency;
use Illuminate\Database\Eloquent\Collection;

interface CurrencyRepositoryInterface
{
    public function getCurrencyById(int $id): Currency;

    public function getPaymentCurrency(): Currency;

    public function getPurchasedCurrencies(): Collection;
}
