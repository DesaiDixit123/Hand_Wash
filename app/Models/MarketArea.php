<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MarketArea extends Model
{
    protected $fillable = ['state', 'city', 'dealer_count', 'details'];

    protected $casts = [
        'dealer_count' => 'integer',
    ];
}
