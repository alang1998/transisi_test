<?php

namespace App\Services;

use App\Company;
use App\Employee;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use PDF;

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

    public function exportHandler($routeView)
    {
        $companies = Company::with('employee')->whereHas('employee')->get();
        $pdf = PDF::loadView($routeView . 'exportPDF', compact('companies'));

        return $pdf;
    }
}