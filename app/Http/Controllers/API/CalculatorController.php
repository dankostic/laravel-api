<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\CalculatorInfoRequest;
use App\Http\Requests\API\CalculatorRequest;
use App\Interfaces\CalculatorServiceInterface;
use App\Interfaces\CurrencyRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class CalculatorController extends Controller
{
    public function __construct(
        private readonly CurrencyRepositoryInterface $currencyRepository,
        private readonly CalculatorServiceInterface $calculatorService
    ) {
    }

    public function info(CalculatorInfoRequest $request): JsonResponse
    {
        $currency = $this->currencyRepository->getCurrencyById($request->id);

        return response()->json(
            [
                'code' => $currency->code,
                'surcharge' => $currency->surcharge->percentage,
                'rate' => $currency->exchangeRate->rate,
            ],
            Response::HTTP_OK);
    }

    public function index(CalculatorRequest $request): JsonResponse
    {
        return response()->json(
            [
                'calculatorAmount' => $this->calculatorService->calculate(
                    $request->amount,
                    $this->currencyRepository->getCurrencyById($request->selectCurrencyId)
                ),
            ],
            Response::HTTP_OK);
    }
}
