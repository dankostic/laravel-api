<?php

namespace App\Http\Controllers;

use App\Interfaces\CurrencyRepositoryInterface;
use App\Repositories\OrderRepository;
use Illuminate\Http\Request;
use Illuminate\View\View;

class OrderController extends Controller
{
    public function __construct(
        private readonly CurrencyRepositoryInterface $currencyRepository,
        private readonly OrderRepository $orderRepository
    ) {
    }

    public function index(): View
    {
        return view('order')->with([
            'paymentCurrency' => $this->currencyRepository->getPaymentCurrency(),
            'purchasedCurrencies' => $this->currencyRepository->getPurchasedCurrencies()
        ]);
    }

    public function store(Request $request)
    {
        $this->orderRepository->store(
            $request,
            $this->currencyRepository->getPurchasedCurrencyById($request->selectCurrencyId)
        );
    }
}
