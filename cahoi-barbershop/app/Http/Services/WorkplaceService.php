<?php

namespace App\Http\Services;

use App\Models\Workplace;
use Illuminate\Database\Eloquent\Collection;

class WorkplaceService
{
    public function getAll(): Collection|array
    {
        return Workplace::all();
    }
}
