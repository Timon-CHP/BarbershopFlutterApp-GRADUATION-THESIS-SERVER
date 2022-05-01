<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TaskImage extends Model
{
    protected $table = 'task_images';

    protected $fillable = [
        'task_id',
        'image_id',
    ];
}
