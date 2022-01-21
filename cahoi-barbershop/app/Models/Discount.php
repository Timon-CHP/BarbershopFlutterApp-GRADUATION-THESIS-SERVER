<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Discount extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';

    protected $table ='discounts';

    public function bills(): HasMany
    {
        return  $this->hasMany(Bill::class);
    }

    public function tasks(): HasMany
    {
        return  $this->hasMany(Task::class);
    }
}
