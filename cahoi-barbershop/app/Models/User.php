<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Model
{
    use HasFactory, HasApiTokens, Notifiable;

    protected $primaryKey = 'user_id';

    protected $fillable = [
        'password',
        'name',
        'phone_number',
        'email',
        'birthday',
        'home_address',
        'work_address',
        'provider_id' ,
        'provider_name',
        'rank_member_id',
        'role_id',
    ];

    public function rankMember()
    {
        return  $this->belongsTo(RankMember::class);
    }

    public function role()
    {
        return  $this->belongsTo(Role::class);
    }

    public function bills()
    {
        return  $this->hasMany(Bill::class);
    }

    public function tasks()
    {
        return  $this->hasMany(Task::class);
    }
}
