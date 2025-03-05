<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
    public function title(): BelongsTo
    {
        return $this->belongsTo(AboutCarrierpageJob::class, 'job_id', 'id');
    }
    public function location(): BelongsTo
    {
        return $this->belongsTo(AboutCarrierpageLocations::class, 'location_id', 'id');
    }
}
