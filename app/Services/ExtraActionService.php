<?php

namespace App\Services;

use App\Http\Factories\ExtraActionFactory;
use App\Models\Currency;
use Illuminate\Http\Request;

class ExtraActionService
{
    public function __construct(
        private readonly Request $request,
        private readonly Currency $currency
    ) {
    }

    /**
     * @return float|null
     */
    public function __invoke(): ?float
    {
        $factory = (new ExtraActionFactory())
            ->getCurrency($this->currency->code)
            ->format($this->request, $this->currency);

        return is_float($factory) ? $factory : null;
    }
}
