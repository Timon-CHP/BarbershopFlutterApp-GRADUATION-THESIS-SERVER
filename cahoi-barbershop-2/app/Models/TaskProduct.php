<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TaskProduct extends Model
{
    protected $table = 'task_products';

    protected $fillable = [
        'task_id',
        'product_id',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'created_by',
    ];
}
