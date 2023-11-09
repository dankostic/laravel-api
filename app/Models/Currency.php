<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Currency extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'name',
        'code',
    ];

    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @return HasOne
     */
    public function surcharge(): HasOne
    {
        return $this->hasOne(Surcharge::class);
    }

    /**
     * @return HasOne
     */
    public function exchangeRate(): HasOne
    {
        return $this->hasOne(ExchangeRate::class, 'currency_purchased_id');
    }

    /**
     * @return HasOne
     */
    public function discount(): HasOne
    {
        return $this->hasOne(Discount::class);
    }
}
