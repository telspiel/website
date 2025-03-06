<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $table = 'Clients';
    protected $fillable = [
        'client_name',
        'title',
        'status',
        'logo'
    ];
}
