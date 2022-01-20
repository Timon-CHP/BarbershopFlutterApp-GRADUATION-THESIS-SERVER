<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;

    protected $primaryKey = 'staff_id';

    protected $fillable = [
        'staff_id',
        'name',
        'birthday',
        'skill_rate',
        'communication_rate',
        'is_working',
        'work_schedule',
        'position_id',
        'workplace_id',
    ];

    public function position(){
        return  $this->belongsTo(Position::class);
    }  

    public function workplace(){
        return  $this->belongsTo(Workplace::class);
    }  
}
