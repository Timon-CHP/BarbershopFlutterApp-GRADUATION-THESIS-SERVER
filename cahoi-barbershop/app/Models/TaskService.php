<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TaskService extends Model
{
    use HasFactory;

    protected $table = 'task_services';

    public function task(): BelongsTo
    {
        return  $this->belongsTo(Task::class);
    }
    public function service(): BelongsTo
    {
        return  $this->belongsTo(Service::class);
    }
}
