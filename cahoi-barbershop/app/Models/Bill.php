<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Bill extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $table = 'bills';

    public function user(): BelongsTo
    {
        return  $this->belongsTo(User::class);
    }
    public function discount(): BelongsTo
    {
        return  $this->belongsTo(Discount::class);
    }

    public function billProducts(): HasMany
    {
        return  $this->hasMany(BillProduct::class);
    }
}
