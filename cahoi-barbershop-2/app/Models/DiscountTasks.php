<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DiscountTasks extends Model
{
    protected $table = 'discount_tasks';

    protected $fillable
        = [
            "discount_id",
            "task_id",
        ];
}
