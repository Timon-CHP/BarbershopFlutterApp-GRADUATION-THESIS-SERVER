<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Post extends Model
{
    protected $table = 'posts';

    protected $fillable
        = [
            'captions',
            'like_count',
            'public_at',
            'delete_at',
        'task_id',
    ];

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'likes', 'user_id', 'post_id');
    }

    public function task(): BelongsTo
    {
        return $this->belongsTo(Task::class, 'task_id', 'id');
    }

    protected $hidden = [
        'created_at',
        'updated_at',
        'created_by',
    ];
}
