<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class IntegrationServicesContent extends Model
{
    use HasFactory;
    protected $table = 'integration_services_content';
    protected $fillable = [
        'cat_id',
        'sub_cat_id',
        'services_id',
        'title',
        'image',
        'image_alt',
        'image_title',
        'content',
        'cta_name',
        'upload_pdf',
        'status'
    ];

    public function category_data(): BelongsTo
    {
        return $this->belongsTo(IntegrationCategory::class, 'cat_id', 'id');
    }
    public function sub_category(): BelongsTo
    {
        return $this->belongsTo(IntegrationSubCategory::class, 'sub_cat_id', 'id');
    }
    public function service(): BelongsTo
    {
        return $this->belongsTo(IntegrationServicesCategory::class, 'services_id', 'id');
    }
}
