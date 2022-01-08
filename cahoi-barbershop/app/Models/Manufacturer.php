<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manufacturer extends Model
{
    use HasFactory;

    protected $primaryKey = 'manufacturer_id';

    protected $fillable = [
        'manufacturer_id',
        'name',
        'country',
    ];

    public function products()
    {
        return  $this->hasMany(Product::class);
    }
}
