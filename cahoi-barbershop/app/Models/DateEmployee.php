<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DateEmployee extends Model
{
    use HasFactory;

    protected $table = 'date_employees';

    public function date(): BelongsTo
    {
        return  $this->belongsTo(Date::class, 'id');
    }

    public function employee(): BelongsTo
    {
        return  $this->belongsTo(Employee::class, 'id');
    }
}
