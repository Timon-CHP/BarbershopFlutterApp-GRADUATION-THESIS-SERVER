<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Task extends Model
{
    protected $table = 'tasks';

    protected $fillable
        = [
            'status',
            'notes',
            'date',
            'time_slot_id',
            'customer_id',
            'stylist_id'
        ];
    protected $hidden
        = [
            'created_at',
            'updated_at',
            'created_by',
        ];

    public function rating(): HasOne
    {
        return $this->hasOne(Rating::class, 'task_id', 'id');
    }

    public function time(): BelongsTo
    {
        return $this->belongsTo(TimeSlot::class, 'time_slot_id', 'id');
    }

    public function customer(): BelongsTo
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

    public function image(): HasMany
    {
        return $this->hasMany(ImageTask::class, 'task_id', 'id');
    }

    public function discount(): BelongsToMany
    {
        return $this->belongsToMany(Discount::class, 'discount_tasks', 'discount_id', 'task_id');
    }
}
