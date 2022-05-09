<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TimeSlot extends Model
{
    protected $table = 'time_slots';

    protected $fillable = [
        'time'
    ];

    public function tasks(): HasMany
    {
        return $this->hasMany('tasks', 'time_slot_id', 'id');
    }

    protected $hidden = [
        'created_at',
        'updated_at',
        'created_by',
    ];
}
