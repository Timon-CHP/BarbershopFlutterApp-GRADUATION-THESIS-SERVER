<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';

    protected $fillable = [
        'captions',
        'like_count',
        'public_at',
        'delete_at',
        'task_id',
    ];

    public function task()
    {
        $this->belongsTo(Task::class, 'task_id', 'id');
    }
}
