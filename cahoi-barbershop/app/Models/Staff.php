<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Staff extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $table = 'staffs';

    public function position(): BelongsTo
    {
        return  $this->belongsTo(Position::class);
    }

    public function workplace(): BelongsTo
    {
        return  $this->belongsTo(Workplace::class);
    }
}
