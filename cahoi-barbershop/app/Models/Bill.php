<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use HasFactory;

    protected $primaryKey = 'bill_id';

    protected $fillable = [
        'bill_id',
        'book_date',
        'total_money',
        'shipping_fee',
        'delivery_address',
        'specific_delivery_address',
        'is_fast_delivery',
        'is_complete',
        'user_id',
    ];

    public function user(){
        return  $this->belongsTo(User::class);
    }  
    
    public function billProducts()
    {
        return  $this->hasMany(BillProduct::class);
    }
}
