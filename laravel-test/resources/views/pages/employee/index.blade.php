@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <div>List of Employee</div>
                <x-action-dropdown>
                    <a href="{{ route('employee.create') }}" class="dropdown-item" type="button">Add Employee</a>
                    <a href="{{ route('employee.exportPDF') }}" class="dropdown-item" type="button">Export Employees</a>
                </x-action-dropdown>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Company</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($employees as $key => $employee)
                            <tr>
                                <td>{{ ($employees->currentpage()-1) * $employees->perpage() + $key + 1 }}</td>
                                <td>{{ $employee->name }}</td>
                                <td>{{ $employee->email }}</td>
                                <td>{{ $employee->company->name }}</td>
                                <td>
                                    <x-action-dropdown>
                                        <a href="{{ route('employee.show', $employee) }}" class="dropdown-item" type="button">Show</a>
                                        <a href="{{ route('employee.edit', $employee) }}" class="dropdown-item" type="button">Edit</a>
                                        <button class="dropdown-item delete-item" data-url="{{ route('employee.destroy', $employee) }}" type="button">Delete</button>
                                    </x-action-dropdown>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $employees->links() }}
            </div>
        </div>
    </div>
@endsection