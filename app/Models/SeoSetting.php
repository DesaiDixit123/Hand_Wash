<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SeoSetting extends Model
{
    protected $fillable = ['page_name', 'meta_title', 'meta_description', 'keywords', 'canonical_url', 'og_image_path'];
}
