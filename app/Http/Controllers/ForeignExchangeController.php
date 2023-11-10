<?php

namespace App\Http\Controllers;

use App\Services\ForeignExchangeService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;

class ForeignExchangeController extends Controller
{
    public function __construct(
        private readonly ForeignExchangeService $foreignExchangeService
    ) {
    }

    /**
     * @return RedirectResponse
     */
    public function index(): RedirectResponse
    {
        $this->foreignExchangeService->update();

        return Redirect::route('index.order');
    }
}
