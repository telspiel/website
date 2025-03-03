<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SolutionSubCategory extends Model
{
    protected $table = 'solution_sub_categories';
    protected $fillable = [
        'cat_id',
        'icon',
        'title',
        'slug',
        'detail',
        'link_name',
        'image',
        'image_alt',
        'image_title',
        'banner_cta_name',
        'banner_cta_link',
        'meta_title',
        'meta_desc',
        'meta_keyword',
        'status',
    ];

    public function category_data(): BelongsTo
    {
        return $this->belongsTo(SolutionMainCategory::class, 'cat_id', 'id');
    }
}
