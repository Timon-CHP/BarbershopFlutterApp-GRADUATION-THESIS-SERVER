<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserProduct extends Model
{
    use HasFactory;

    protected $table = 'user_products';

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function Product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
