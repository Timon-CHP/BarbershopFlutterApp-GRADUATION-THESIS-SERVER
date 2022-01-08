<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryProduct extends Model
{
    use HasFactory;

    protected $primaryKey = 'category_product_id';

    protected $fillable = [
        'category_product_id',
        'name',
    ];

    public function products()
    {
        return  $this->hasMany(Product::class);
    }
}
