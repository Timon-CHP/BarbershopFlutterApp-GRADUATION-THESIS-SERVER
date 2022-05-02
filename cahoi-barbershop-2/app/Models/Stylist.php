<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stylist extends Model
{
    protected $table = 'stylists';

    protected $fillable = [
        'communication_rate',
        'skill_rate',
        'user_id',
        'facility_id'
    ];

    public function user()
    {
        $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function tasks()
    {
        $this->hasMany(Task::class, 'stylist_id', 'id');
    }

    public function facility()
    {
        $this->belongsTo(Facility::class, 'facility_id', 'id');
    }

    public function calendar()
    {
        $this->hasMany(Calendar::class, 'stylist_id', 'id');
    }
}
