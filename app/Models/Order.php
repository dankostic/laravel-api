<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;

class Order extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, double>
     */
    protected $fillable = [
        'currency_id',
        'currency_purchased_id',
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

    /**
     * @return BelongsTo
     */
    public function currency(): BelongsTo
    {
        return $this->belongsTo(Currency::class);
    }

    /**
     * @return BelongsTo
     */
    public function currencyPurchased(): BelongsTo
    {
        return $this->belongsTo(Currency::class, 'currency_purchased_id');
    }

    /**
     * @return BelongsTo
     */
    public function surcharge(): BelongsTo
    {
        return $this->belongsTo(Surcharge::class, 'currency_purchased_id', 'currency_id');
    }

    /**
     * @return HasOneThrough
     */
    public function exchangeRate(): HasOneThrough
    {
        return $this->HasOneThrough(ExchangeRate::class, Currency::class, 'id', 'currency_purchased_id', 'currency_purchased_id', 'id');
    }

    /**
     * @return HasOneThrough
     */
    public function discount(): HasOneThrough
    {
        return $this->HasOneThrough(Discount::class, Currency::class, 'id', 'currency_id', 'currency_purchased_id', 'id');
    }
}
