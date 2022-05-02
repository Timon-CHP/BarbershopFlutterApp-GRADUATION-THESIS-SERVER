<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table = 'images';

    protected $fillable = [
        'link',
    ];

    public function tasks()
    {
        $this->belongsToMany(Product::class, 'task_images', 'image_id', 'task_id');
    }

    public function facilities()
    {
        $this->belongsToMany(Facility::class, 'facility_images', 'image_id', 'facility_id');
    }

    public function products()
    {
        $this->belongsToMany(Product::class, 'product_images', 'image_id', 'product_id');
    }

    //TODO có nhiều ảnh của user nữa (avatar)
}
