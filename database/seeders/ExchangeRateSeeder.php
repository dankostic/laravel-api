<?php

namespace Database\Seeders;

use App\Models\ExchangeRate;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ExchangeRateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ExchangeRate::insert([
            [
                'currencies_id' => 1,
                'currencies_purchased_id' => 2,
                'rate' => 107.17,
            ],
            [
                'currencies_id' => 1,
                'currencies_purchased_id' => 3,
                'rate' => 0.711178,
            ],
            [
                'currencies_id' => 1,
                'currencies_purchased_id' => 4,
                'rate' => 0.884872,
            ],
        ]);
    }
}
