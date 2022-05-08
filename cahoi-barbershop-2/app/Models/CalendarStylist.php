<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CalendarStylist extends Model
{
    protected $table = 'calendar_stylist';

    protected $fillable = [
        'stylist_id',
        'calendar_id',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'created_by',
    ];
}
