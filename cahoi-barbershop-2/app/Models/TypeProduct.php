<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TypeProduct extends Model
{
    protected $table = 'type_products';

    protected $fillable = [
        'name',
    ];

    public function Products()
    {
        $this->hasMany(Product::class, 'type_product_id', 'id');
    }
}
