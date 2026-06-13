<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $fillable = ['title', 'subtitle', 'image_path', 'button_text', 'button_link', 'status', 'sort_order'];

    protected $casts = [
        'status' => 'boolean',
        'sort_order' => 'integer',
    ];
}
