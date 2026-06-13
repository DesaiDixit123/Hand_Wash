<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'category_id', 'name', 'slug', 'short_description', 'description',
        'specifications', 'features', 'benefits', 'applications', 'brochure_path', 'status'
    ];

    protected $casts = [
        'status' => 'boolean',
        'specifications' => 'array',
        'features' => 'array',
        'benefits' => 'array',
        'applications' => 'array',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function primaryImage()
    {
        return $this->hasOne(ProductImage::class)->where('is_primary', true);
    }
}
