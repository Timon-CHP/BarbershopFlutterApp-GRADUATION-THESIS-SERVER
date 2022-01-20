<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BillProduct extends Model
{
    use HasFactory;

    protected $fillable = [
        'quantily',
        'shipping_fee',
        'delivery_address',
        'specific_delivery_address',
        'is_fast_delivery',
        'bill_id',
        'product_id'
    ];

    public function bill()
    {
        return  $this->belongsTo(Bill::class);
    }

    public function product()
    {
        return  $this->belongsTo(Product::class);
    }
}
