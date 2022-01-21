<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $table = 'products';

    public function categoryProduct(): BelongsTo
    {
        return  $this->belongsTo(CategoryProduct::class);
    }

    public function categoryManufacturer(): BelongsTo
    {
        return  $this->belongsTo(Manufacturer::class);
    }

    public function billProducts(): HasMany
    {
        return  $this->hasMany(BillProduct::class);
    }
}
