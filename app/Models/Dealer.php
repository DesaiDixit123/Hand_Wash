<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dealer extends Model
{
    protected $fillable = ['company_name', 'owner_name', 'email', 'mobile', 'gst_number', 'address', 'state', 'city', 'status'];
}
