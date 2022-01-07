@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <div>List of Company</div>
                <x-action-dropdown>
                    <a href="{{ route('company.create') }}" class="dropdown-item" type="button">Add Company</a>
                    <button type="button" class="dropdown-item" data-toggle="modal" data-target="#importModal">
                        Import Companies
                    </button>
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
                                        <a href="{{ route('company.edit', $company) }}" class="dropdown-item" type="button">Edit</a>
                                        <button class="dropdown-item delete-item" data-url="{{ route('company.destroy', $company) }}" type="button">Delete</button>
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

@section('modal')
<div class="modal fade" id="importModal" tabindex="-1" role="dialog" aria-labelledby="importModalTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="{{ route('company.import') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="importModalTitle">Import Companies</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                        <input type="file" name="import" class="form-control-file">
                        <x-validation-error name="import" />
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Import</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection