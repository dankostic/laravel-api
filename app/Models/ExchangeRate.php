<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExchangeRate extends Model
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
        'rate',
    ];

    /**
     * @var bool
     */
    public $timestamps = false;
}
