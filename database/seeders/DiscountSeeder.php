<?php

namespace Database\Seeders;

use App\Models\Discount;
use Illuminate\Database\Seeder;

class DiscountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Discount::insert([
            [
                'currency_id' => 2,
                'percentage' => null,
            ],
            [
                'currency_id' => 3,
                'percentage' => null,
            ],
            [
                'currency_id' => 4,
                'percentage' => 2,
            ],
        ]);
    }
}
