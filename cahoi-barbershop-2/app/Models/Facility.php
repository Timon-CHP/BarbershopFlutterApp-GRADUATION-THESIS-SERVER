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
    ];

    public function stylist()
    {
        $this->hasMany(Stylist::class, 'facility_id', 'id');
    }

    public function images()
    {
        $this->belongsToMany(Image::class, 'facility_images', 'facility_id', 'image_id');
    }
}
