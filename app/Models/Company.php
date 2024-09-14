<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    // Define the table associated with the model (if different from the default)
    protected $table = 'companies';

    // Define the attributes that are mass assignable
    protected $fillable = [
        'image',
    ];
}
