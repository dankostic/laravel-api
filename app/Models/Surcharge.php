<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surcharge extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, double>
     */
    protected $fillable = [
        'currencies_id',
        'percentage',
    ];

    /**
     * @var bool
     */
    public $timestamps = false;
}
