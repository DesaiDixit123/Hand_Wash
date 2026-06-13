<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    protected $fillable = ['client_name', 'designation', 'review', 'client_image', 'rating'];

    protected $casts = [
        'rating' => 'integer',
    ];
}
