<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;
    protected $fillable = [
        'exam_id',
        'jobpost_id',
        'f_name',
        'l_name',
        'email',
        'contact_number',
        'address',
        'resume_file',
        'application_file',
        'application_status',
    ];
}
