<?php

namespace App\Http\Controllers;

use App\Interfaces\CurrencyRepositoryInterface;
use App\Models\Order;
use App\Repositories\OrderRepository;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class OrderController extends Controller
{
    public function __construct(
        private readonly CurrencyRepositoryInterface $currencyRepository,
        private readonly OrderRepository $orderRepository
    ) {
    }

    /**
     * @return View
     */
    public function index(): View
    {
        return view('orders.index')->with([
            'paymentCurrency' => $this->currencyRepository->getPaymentCurrency(),
            'purchasedCurrencies' => $this->currencyRepository->getPurchasedCurrencies()
        ]);
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $order = $this->orderRepository->store(
            $request,
            $this->currencyRepository->getCurrencyById($request->selectCurrencyId)
        );

        return Redirect::to("orders/$order->id");
    }

    /**
     * @param Order $order
     * @return View
     */
    public function show(Order $order): View
    {
        return view('orders.show')->with('order', $order);
    }
}
