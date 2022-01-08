<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskService extends Model
{
    use HasFactory;

    protected $fillable = [
        'task_id',
        'service_id',
    ];

    public function task()
    {
        return  $this->belongsTo(Task::class);
    }
    public function service()
    {
        return  $this->belongsTo(Service::class);
    }
}
