<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Calendar extends Model
{
    protected $table = 'calendars';

    protected $fillable = [
        'scheduled_start_at',
        'scheduled_end_at',
        'check_in_at',
        'check_out_at',
        'stylist_id',
    ];

    public function stylist()
    {
        $this->belongsTo(Stylist::class, 'stylist_id', 'id');
    }
}
