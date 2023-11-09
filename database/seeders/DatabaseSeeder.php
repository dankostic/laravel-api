<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            CurrencySeeder::class,
            ExchangeRateSeeder::class,
            SurchargeSeeder::class,
            DiscountSeeder::class,
            ]);
    }
}
