<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryService extends Model
{
    use HasFactory;

    protected $primaryKey = 'category_service_id';

    protected $fillable = [
        'category_service_id',
        'name',
    ];

    public function services(){
        return  $this->hasMany(Service::class);
    }   
}
