<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Rank extends Model
{
    protected $table = 'ranks';

    protected $fillable = [
        'rank_name',
        'threshold',
    ];

    public function users(): HasMany
    {
        return $this->hasMany(User::class, 'rank_id', 'id');
    }
}
