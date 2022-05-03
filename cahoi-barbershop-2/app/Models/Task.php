<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Task extends Model
{
    protected $table = 'tasks';

    protected $fillable = [
        'status',
        'time_start_at',
        'notes',
        'customer_id',
        'stylist_id'
    ];

    public function rating(): HasOne
    {
        return $this->hasOne(Rating::class, 'task_id', 'id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'customer_id', 'id');
    }

    public function stylist(): BelongsTo
    {
        return $this->belongsTo(Stylist::class, 'stylist_id', 'id');
    }

    public function bill(): HasOne
    {
        return $this->hasOne(Bill::class, 'task_id', 'id');
    }

    public function post(): HasOne
    {
        return $this->hasOne(Post::class, 'task_id', 'id');
    }

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'task_products', 'task_id', 'product_id');
    }

    public function images(): BelongsToMany
    {
        return $this->belongsToMany(Image::class, 'task_images', 'task_id', 'image_id');
    }
}
