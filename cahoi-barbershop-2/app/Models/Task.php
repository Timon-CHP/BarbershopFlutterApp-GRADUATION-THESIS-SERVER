<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $table = 'task';

    protected $fillable = [
        'status',
        'time_start_at',
        'notes',
        'customer_id',
        'stylist_id'
    ];

    public function rating()
    {
        $this->hasOne(Rating::class, 'task_id', 'id');
    }

    public function user()
    {
        $this->belongsTo(User::class, 'customer_id', 'id');
    }

    public function stylist()
    {
        $this->belongsTo(Stylist::class, 'stylist_id', 'id');
    }

    public function bill()
    {
        $this->hasOne(Bill::class, 'task_id', 'id');
    }

    public function post()
    {
        $this->hasOne(Post::class, 'task_id', 'id');
    }

    public function products()
    {
        $this->belongsToMany(Product::class, 'task_products', 'task_id', 'product_id');
    }

    public function images()
    {
        $this->belongsToMany(Image::class, 'task_images', 'task_id', 'image_id');
    }
}
