<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RankMember extends Model
{
    use HasFactory;

    protected $primaryKey = 'rank_member_id';

    protected $fillable = [
        'rank_member_id',
        'name',
    ];

    public function users()
    {
        return  $this->hasMany(User::class);
    }
}
