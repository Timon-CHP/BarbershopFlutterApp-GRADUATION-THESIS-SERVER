<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Facility extends Model
{
    protected $table = 'facilities';

    protected $fillable
        = [
            'address',
            'description',
            'longitude',
            'latitude',
            'image'
        ];

    protected $hidden
        = [
            'created_at',
            'updated_at',
            'created_by',
        ];

    public function stylist(): HasMany
    {
        return $this->hasMany(Stylist::class, 'facility_id', 'id');
    }

    public function revenue(): HasMany
    {
        return $this->hasMany(Revenue::class, 'facility_id', 'id');
    }
}
