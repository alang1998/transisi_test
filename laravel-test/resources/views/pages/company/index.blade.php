@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <div>List of Company</div>
                <x-action-dropdown>
                    <a href="{{ route('company.create') }}" class="dropdown-item" type="button">Add Company</a>
                </x-action-dropdown>
            </div>
        </div>
        <div class="card-body">
            <div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Website</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($companies as $key => $company)
                            <tr>
                                <td>{{ ($companies->currentpage()-1) * $companies->perpage() + $key + 1 }}</td>
                                <td>{{ $company->name }}</td>
                                <td>{{ $company->email }}</td>
                                <td>{{ $company->website }}</td>
                                <td>
                                    <x-action-dropdown>                                        
                                        <a href="{{ route('company.show', $company) }}" class="dropdown-item" type="button">Show</a>
                                        <a href="{{ route('company.create') }}" class="dropdown-item" type="button">Edit</a>
                                        <a href="{{ route('company.create') }}" class="dropdown-item" type="button">Delete</a>
                                    </x-action-dropdown>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $companies->links() }}
            </div>
        </div>
    </div>
@endsection