<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CareerContact extends Model
{
    protected $table = 'career_job_enquries';
    protected $fillable = [
        'job_id',
        'location_id',
        'name',
        'email',
        'phone',
        'company',
        'message',
    ];

}