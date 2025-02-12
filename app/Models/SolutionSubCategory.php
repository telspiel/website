<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SolutionSubCategory extends Model
{
    protected $table = 'solution_sub_categories';
    protected $fillable = [
        'cat_id',
        'title',
        'slug',
        'banner_cta_name',
        'banner_cta_link',
        'icon',
        'image',
        'link_name'
    ];
}
