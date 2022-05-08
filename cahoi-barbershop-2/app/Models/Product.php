<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable = [
        'name',
        'duration',
        'price',
        'sort_description',
        'description',
        'type_product_id',
    ];

    public function tasks(): BelongsToMany
    {
        return $this->belongsToMany(Task::class, 'task_products', 'product_id', 'task_id');
    }

    public function type(): BelongsTo
    {
        return $this->belongsTo(TypeProduct::class, 'type_product_id', 'id');
    }

    public function images(): HasMany
    {
        return $this->hasMany(ImageProduct::class, 'product_id', 'id');
    }

    protected $hidden = [
        'created_at',
        'updated_at',
        'created_by',
    ];
}
