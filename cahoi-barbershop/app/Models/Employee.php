<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Employee extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $table = 'employees';

    public function position(): BelongsTo
    {
        return  $this->belongsTo(Position::class);
    }

    public function workplace(): BelongsTo
    {
        return  $this->belongsTo(Workplace::class);
    }

    public function dateEmployees(): HasMany
    {
        return $this->hasMany(DateEmployee::class);
    }
}
