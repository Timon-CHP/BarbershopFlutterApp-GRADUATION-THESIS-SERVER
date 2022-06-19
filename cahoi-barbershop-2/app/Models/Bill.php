<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Bill extends Model
{
    protected $table = 'bills';

    protected $fillable = [
        'total',
        'task_id',
    ];

    public function task(): BelongsTo
    {
        return $this->belongsTo(Task::class, 'task_id', 'id');
    }

    protected $hidden = [
        // 'created_at',
        // 'updated_at',
        'created_by',
    ];
}
