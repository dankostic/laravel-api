<?php

namespace Database\Seeders;

use App\Models\Currency;
use Illuminate\Database\Seeder;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Currency::insert([
            [
                'name' => 'US Dollars',
                'code' => 'USD',
            ],
            [
                'name' => 'Japanese Yen',
                'code' => 'JPY',
            ],
            [
                'name' => 'British Pound',
                'code' => 'GBP',
            ],
            [
                'name' => 'Euro',
                'code' => 'EUR',
            ],
        ]);
    }
}
