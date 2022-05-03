<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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

    public function tasks()
    {
        return $this->belongsToMany(Task::class, 'task_products', 'product_id', 'task_id');
    }

    public function type()
    {
        return $this->belongsTo(TypeProduct::class, 'type_product_id', 'id');
    }

    public function images()
    {
        return $this->belongsToMany(Image::class, 'product_images', 'product_id', 'image_id');
    }
}
