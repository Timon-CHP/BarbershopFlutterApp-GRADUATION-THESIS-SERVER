<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rank extends Model
{
    protected $table = 'ranks';

    protected $fillable = [
        'rank_name',
        'threshold',
    ];

    public function users()
    {
        $this->belongsTo(User::class, 'user_id', 'id');
    }
}
