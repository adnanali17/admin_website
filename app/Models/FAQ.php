<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FAQ extends Model
{
    use HasFactory;

    // Define the fillable properties
    protected $fillable = [
        'question',
        'answer',
    ];

    // Optionally, you can define hidden or guarded properties
    // protected $hidden = [];
    // protected $guarded = [];
}
