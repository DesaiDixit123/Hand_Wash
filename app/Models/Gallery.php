<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    // Specify the table since 'gallery' is singular and Laravel might try to look for 'galleries'
    protected $table = 'gallery';

    protected $fillable = ['title', 'image_path', 'type'];
}
