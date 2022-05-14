<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Stylist extends Model
{
    protected $table = 'stylists';

    protected $fillable = [
        'user_id',
        'facility_id'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function tasks(): HasMany
    {
        return $this->hasMany(Task::class, 'stylist_id', 'id');
    }

    public function facility(): BelongsTo
    {
        return $this->belongsTo(Facility::class, 'facility_id', 'id');
    }

    public function calendar(): BelongsToMany
    {
        return $this->belongsToMany(Calendar::class, 'calendar_stylist', 'calendar_id', 'stylist_id');
    }

    protected $hidden = [
        'created_at',
        'updated_at',
        'created_by',
    ];
}
