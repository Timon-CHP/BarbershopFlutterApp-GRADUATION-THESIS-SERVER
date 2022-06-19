<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Revenue extends Model
{
    protected $table = 'revenue';

    protected $fillable
        = [
            'total_revenue_month',
            'is_paid',
            'closing_at',
            'facility_id'
        ];


    protected $hidden
        = [
            "created_by"
        ];

    public function facility(): BelongsTo
    {
        return $this->belongsTo(Facility::class, 'facility_id', 'id');
    }
}
