<?php

namespace App\Http\Controllers;

use App\Interfaces\CurrencyRepositoryInterface;
use App\Interfaces\OrderRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\View\View;

class OrderController extends Controller
{
    public function __construct(
        private readonly CurrencyRepositoryInterface $currencyRepository,
        private readonly OrderRepositoryInterface $orderRepository
    ) {
    }

    public function index(): View
    {
        return view('order')->with([
            'paymentCurrency' => $this->currencyRepository->getPaymentCurrency(),
            'purchasedCurrencies' => $this->currencyRepository->getPurchasedCurrencies()
        ]);
    }
}
