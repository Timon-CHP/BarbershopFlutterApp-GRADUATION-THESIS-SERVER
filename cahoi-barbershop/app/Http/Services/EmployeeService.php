<?php

namespace App\Http\Services;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class EmployeeService
{
    public function getAll(): Collection|array
    {
        return Employee::all();
    }

    public function getByPositionId($position_id): Collection|array
    {
        return Employee::where('position_id', $position_id);
    }

    public function getStylist($workplace_id)
    {
        return Employee::where('position_id', '4')
            ->where('workplace_id', $workplace_id)->get();
    }

    public function getStylistByDate(Request $request, $workplace_id)
    {
        $date = $request['date'];
        return ['a' => $date];
    }
}
