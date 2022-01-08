<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    use HasFactory;
    protected $primaryKey = 'discount_id';

    protected $fillable = [
        'discount_id',
        'name',
        'description',
        'percent_discount',
        'start_applying_at',
        'end_applying_at',
    ];
}
