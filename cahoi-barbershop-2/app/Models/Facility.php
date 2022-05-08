<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Facility extends Model
{
    protected $table = 'facilities';

    protected $fillable = [
        'address',
        'description',
        'longitude',
        'latitude',
        'image'
    ];

    public function stylist()
    {
        $this->hasMany(Stylist::class, 'facility_id', 'id');
    }

    protected $hidden = [
        'created_at',
        'updated_at',
        'created_by',
    ];
}
