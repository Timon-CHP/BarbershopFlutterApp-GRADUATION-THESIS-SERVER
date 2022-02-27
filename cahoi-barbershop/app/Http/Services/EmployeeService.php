<?php

namespace App\Http\Services;

use App\Models\Date;
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
        $date = Date::where('year', '=', $request['year'])
            ->where('month', '=', $request['month'])
            ->where('day_of_month', '=', $request['day'])->first();

//        $dateEmployees = DateEmployee::where('date_id', '=', $date->id)
//            ->with(['employee' => function ($query) use ($workplace_id) {
//                $query->where('position_id', '4')
//                    ->where('workplace_id', $workplace_id)->get();
//            }])
//            ->get();
        $dateEmployees = Employee::whereHas(
            'dateEmployees',
            function ($query) use ($date) {
                $query->where('date_id', $date->id);
            })->where('position_id', '4')
            ->where('workplace_id', $workplace_id)->get();
//        $arr = [];
//        foreach ($dateEmployees as $dateEmployee) {
//            $arr = array_push($dateEmployee
//                ->employee()
//                ->where('position_id', '4')
//                ->where('workplace_id', $workplace_id)->first());
//        }
        return $dateEmployees;
    }
}
