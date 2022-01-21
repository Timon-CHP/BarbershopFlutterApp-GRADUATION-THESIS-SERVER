<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Service extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $table = 'services';

    public function categoryService(): BelongsTo
    {
        return $this->belongsTo(CategoryService::class);
    }

    public function taskServices(): HasMany
    {
        return $this->hasMany(TaskService::class);
    }
}
