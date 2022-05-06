<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Calendar extends Model
{
    protected $table = 'calendars';

    protected $fillable = [
        'scheduled_start_at',
        'scheduled_end_at',
    ];

    public function stylist(): BelongsToMany
    {
        return $this->belongsToMany(Stylist::class, 'calendar_stylist', 'stylist_id', 'calendar_id');
    }
}
