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
                'currency_id' => 2,
                'percentage' => 7.5,
            ],
            [
                'currency_id' => 3,
                'percentage' => 5,
            ],
            [
                'currency_id' => 4,
                'percentage' => 5,
            ],
        ]);
    }
}
