<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Date extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $table = 'dates';

    public function dateEmployees(): HasMany
    {
        return $this->hasMany(DateEmployee::class);
    }
}
