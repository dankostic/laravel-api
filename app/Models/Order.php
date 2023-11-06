<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, double>
     */
    protected $fillable = [
        'currencies_id',
        'currencies_purchased_id',
        'surcharges_id',
        'amount_of_surcharge',
        'amount_of_currency_purchased',
        'amount_paid_in_dollars',
        'discount_percentage',
        'discount_amount',
        'created',
    ];

    /**
     * @var bool
     */
    public $timestamps = false;
}
