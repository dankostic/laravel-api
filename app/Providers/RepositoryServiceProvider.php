<?php

namespace App\Providers;

use App\Interfaces\CalculatorServiceInterface;
use App\Interfaces\CurrencyRepositoryInterface;
use App\Interfaces\ExchangeRateServiceInterface;
use App\Interfaces\OrderRepositoryInterface;
use App\Repositories\CurrencyRepository;
use App\Repositories\OrderRepository;
use App\Services\CalculatorService;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(CurrencyRepositoryInterface::class, CurrencyRepository::class);
        $this->app->bind(OrderRepositoryInterface::class, OrderRepository::class);
        $this->app->bind(CalculatorServiceInterface::class, CalculatorService::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
