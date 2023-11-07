<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Interfaces\CalculatorServiceInterface;
use App\Interfaces\CurrencyRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CalculatorController extends Controller
{
    public function __construct(
        private readonly CurrencyRepositoryInterface $currencyRepository,
        private readonly CalculatorServiceInterface $calculatorService
    ) {
    }

    public function info(Request $request): JsonResponse
    {
        $currency = $this->currencyRepository->getPurchasedCurrencyById($request->id);

        return response()->json(
            [
                'code' => $currency->code,
                'surcharge' => $currency->surcharge->percentage,
                'rate' => $currency->exchangeRate->rate,
            ],
            Response::HTTP_OK);
    }

    public function index(Request $request): JsonResponse
    {
        $surchargeAmount = $this->calculatorService->calculate($request->amount, $this->currencyRepository->getPurchasedCurrencyById($request->selectCurrencyId));

        return response()->json(
            [
                'surchargeAmount' => $surchargeAmount,
                'selectCurrency' => $request->selectCurrencyId
            ],
            Response::HTTP_OK);
    }
}
