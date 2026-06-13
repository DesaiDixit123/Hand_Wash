<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Distributor extends Model
{
    protected $fillable = ['company_name', 'contact_person', 'email', 'mobile', 'business_experience', 'address', 'status'];
}
