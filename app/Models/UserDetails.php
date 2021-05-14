<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDetails extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'user_address',
        'user_contact_number',
        'user_elementary',
        'user_highschool',
        'user_college',
        'user_resume',
        'user_cv',
        'user_current_job',
        'user_language',
        'user_hobbies',
        'user_motto',
        'user_bio',
        'user_talents',
        'user_website',
        'user_religion',
        'user_birthday',
    ];
}
