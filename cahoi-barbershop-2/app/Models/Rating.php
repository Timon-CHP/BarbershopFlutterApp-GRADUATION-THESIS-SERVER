<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $table = 'ratings';

    protected $fillable = [
        'communication_rate',
        'skill_rate',
        'comment',
        'task_id',
    ];

    public function task()
    {
        $this->belongsTo(Task::class, 'task_id', 'id');
    }
}
