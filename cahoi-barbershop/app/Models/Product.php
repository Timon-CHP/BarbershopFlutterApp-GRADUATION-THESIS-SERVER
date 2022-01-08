<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $primaryKey = 'product_id';

    protected $fillable = [
        'product_id',
        'name',
        'price',
        'remaining_quantity',
        'information',
        'description',
        'product_manual',
        'images',
        'catagory_product_id',
        'manufacturer_id',
    ];

    public function categoryProduct()
    {
        return  $this->belongsTo(CategoryProduct::class);
    }

    public function categoryManufacturer()
    {
        return  $this->belongsTo(Manufacturer::class);
    }

    public function billProducts()
    {
        return  $this->hasMany(BillProduct::class);
    }
}
