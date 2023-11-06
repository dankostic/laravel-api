<?php

namespace Database\Seeders;

use App\Models\Surcharge;
use Illuminate\Database\Seeder;

class SurchargeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Surcharge::insert([
            [
                'currencies_id' => 2,
                'percentage' => 7.5,
            ],
            [
                'currencies_id' => 3,
                'percentage' => 5,
            ],
            [
                'currencies_id' => 4,
                'percentage' => 5,
            ],
        ]);
    }
}
