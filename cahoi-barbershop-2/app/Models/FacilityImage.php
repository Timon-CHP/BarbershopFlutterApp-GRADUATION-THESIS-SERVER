<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FacilityImage extends Model
{
    protected $table = 'facility_images';

    protected $fillable = [
        'facility_id',
        'image_id',
    ];
}
