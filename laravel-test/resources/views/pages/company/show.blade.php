@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">{{ $company->name }}</div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="d-flex justify-content-center">
                        <img src="{{ url('storage/company/'.$company->logo) }}" alt="{{ $company->logo }}">
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="border-bottom d-flex justify-content-between p-2">
                        <label>Name: </label>
                        {{ $company->name }}
                    </div>
                    <div class="border-bottom d-flex justify-content-between p-2">
                        <label>Email: </label>
                        <div>{{ $company->email }}</div>
                    </div>
                    <div class="border-bottom d-flex justify-content-between p-2">
                        <label>Website: </label>
                        <div>{{ $company->website }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection