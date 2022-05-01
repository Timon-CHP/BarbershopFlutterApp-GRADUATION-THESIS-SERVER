<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table = '';

    protected $fillable = [];

    public function facilities()
    {
        $this->belongsToMany(Facility::class, 'facility_images', 'image_id', 'facility_id');
    }

    public function products()
    {
        $this->belongsToMany(Product::class, 'product_images', 'image_id', 'product_id');
    }
}
