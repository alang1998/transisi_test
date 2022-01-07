<?php

namespace App\Services;

use App\Employee;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Storage;

class EmployeeService
{
    public function getRecords($recordPerPage = 10): LengthAwarePaginator
    {
        return Employee::orderBy('id', 'DESC')
            ->paginate($recordPerPage);
    }

    public function storeHandler($request)
    {
        $employee = new Employee;
        $newEmployee = $request->all();
        $employee->saveForm($newEmployee);
    }

    public function updateHandler($request, $employee)
    {
        $newEmployee = $request->all();
        $employee->saveForm($newEmployee);
    }

    public function destroyHandler($employee)
    {
        $employee->delete();
    }
}