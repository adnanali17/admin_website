<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TeamMember extends Model
{
    protected $fillable = [
        'name', 'field', 'description', 'work_history_feedback', 'projects_done',
        'success_rate', 'experience_years', 'location', 'linkedin', 'twitter',
        'facebook', 'contact_number', 'email', 'address'
    ];
}
