<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    protected $table = 'discounts';

    protected $fillable = [
        'code',
        'name',
        'description',
        'reduction',
    ];

    public function bills()
    {
        $this->hasMany(Bill::class, 'discount_id');
    }
}
