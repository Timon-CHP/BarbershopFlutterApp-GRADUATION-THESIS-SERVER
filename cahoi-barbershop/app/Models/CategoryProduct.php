<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CategoryProduct extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $table = 'category_products';

    public function products(): HasMany
    {
        return  $this->hasMany(Product::class);
    }
}
