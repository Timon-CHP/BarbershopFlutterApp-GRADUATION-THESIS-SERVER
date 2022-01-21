<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Workplace extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';

    protected $table = 'workplaces';

    public function products(): HasMany
    {
        return  $this->hasMany(Staff::class);
    }
}
