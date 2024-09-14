<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pricing extends Model
{
    use HasFactory;

    // Define the table associated with the model (if different from the default)
    protected $table = 'pricings';

    // Define the attributes that are mass assignable
    protected $fillable = [
        'plan_name',
        'description',
        'features',
        'price',
    ];

    // Define the attributes that should be cast to native types
    protected $casts = [
        'features' => 'array', // Automatically cast the JSON field to an array
    ];
}
