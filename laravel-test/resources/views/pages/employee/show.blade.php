@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">{{ $employee->name }}</div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="border-bottom d-flex justify-content-between p-2">
                        <label>Name: </label>
                        {{ $employee->name }}
                    </div>
                    <div class="border-bottom d-flex justify-content-between p-2">
                        <label>Email: </label>
                        <div>{{ $employee->email }}</div>
                    </div>
                    <div class="border-bottom d-flex justify-content-between p-2">
                        <label>Company: </label>
                        <div>{{ $employee->company->name }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection