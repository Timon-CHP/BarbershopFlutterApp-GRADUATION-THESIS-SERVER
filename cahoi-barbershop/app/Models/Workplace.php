<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Workplace extends Model
{
    use HasFactory;
    protected $primaryKey = 'workplace_id';

    protected $fillable = [
        'workplace_id',
        'address',
        'longitude',
        'latitude',
    ];

    public function products()
    {
        return  $this->hasMany(Staff::class);
    }
}
