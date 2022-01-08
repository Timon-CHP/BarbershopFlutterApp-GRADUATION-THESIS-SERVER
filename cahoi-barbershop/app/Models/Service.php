<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $primaryKey = 'service_id';

    protected $fillable = [
        'service_id',
        'name',
        'full_description',
        'price',
        'category_service_id',
    ];

    public function categoryService(){
        return  $this->belongsTo(CategoryService::class);
    }   

    public function taskServices()
    {
        return  $this->hasMany(TaskService::class);
    }
}
