<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BottomContact extends Model
{
    protected $table = 'every_page_bottom_contact_us_enquries';
    protected $fillable = [
        'name',
        'email',
        'phone_no',
    ];

}