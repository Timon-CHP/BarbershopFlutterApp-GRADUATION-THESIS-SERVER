<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BillProduct extends Model
{
    use HasFactory;

    protected $table = 'bill_products';

    public function bill(): BelongsTo
    {
        return  $this->belongsTo(Bill::class);
    }

    public function product(): BelongsTo
    {
        return  $this->belongsTo(Product::class);
    }
}
