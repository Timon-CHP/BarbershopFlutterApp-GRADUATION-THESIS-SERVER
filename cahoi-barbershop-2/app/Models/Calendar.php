<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Calendar extends Model
{
    protected $table = 'calendars';

    protected $fillable = [
        'scheduledStartAt',
        'scheduledEndAt',
        'checkInAt',
        'checkOutAt',
        'stylist_id',
    ];

    public function stylist()
    {
        $this->belongsTo(Stylist::class, 'stylist_id', 'id');
    }
}
