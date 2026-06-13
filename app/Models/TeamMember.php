<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TeamMember extends Model
{
    protected $fillable = ['name', 'designation', 'image_path', 'bio', 'linkedin_url', 'sort_order'];

    protected $casts = [
        'sort_order' => 'integer',
    ];
}
