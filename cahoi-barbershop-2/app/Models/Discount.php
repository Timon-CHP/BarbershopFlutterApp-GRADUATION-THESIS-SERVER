<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Discount extends Model
{
    protected $table = 'discounts';

    protected $fillable
        = [
            'code',
            'name',
            'is_public',
            'description',
            'reduction',
        ];
    protected $hidden
        = [
            'created_at',
            'updated_at',
            'created_by',
        ];


    public function tasks(): BelongsToMany
    {
        return $this->belongsToMany(Task::class, 'discount_tasks', 'discount_id', 'task_id');
    }
}
