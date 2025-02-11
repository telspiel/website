<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactUsForm extends Model
{
    protected $table = 'contact_page_enquries';
    protected $fillable = [
        'name',
        'email',
        'phone',
        'company',
        'message',
    ];

}