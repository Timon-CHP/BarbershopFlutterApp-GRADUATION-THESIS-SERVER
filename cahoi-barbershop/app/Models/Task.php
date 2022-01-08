<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $primaryKey = 'task_id';

    protected $fillable = [
        'task_id',
        'book_date',
        'total_money',
        'is_save_photo',
        'is_consulting',
        'is_complete',
        'user_id',
    ];

    public function user()
    {
        return  $this->belongsTo(User::class);
    }

    public function taskServices()
    {
        return  $this->hasMany(TaskService::class);
    }
}
