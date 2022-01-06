@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            Add Company
        </div>
        <div class="card-body">
            <form action="{{ route('company.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="companyName">Name</label>
                    <input type="text" class="form-control" id="companyName" placeholder="" name="name" value="{{ old('name') }}">
                    <x-validation-error name="name" />
                </div>
                <div class="form-group">
                    <label for="companyEmail">Email address</label>
                    <input type="email" class="form-control" id="companyEmail" placeholder="name@example.com" name="email" value="{{ old('email') }}">
                    <x-validation-error name="email" />
                </div>
                <div class="form-group">
                    <label for="companyWebsite">Website</label>
                    <input type="text" class="form-control" id="companyWebsite" placeholder="www.example.com" name="website" value="{{ old('website') }}">
                    <x-validation-error name="website" />
                </div>
                <div class="form-group">
                    <label for="companyLogo">Logo</label>
                    <input type="file" class="form-control-file" id="companyLogo" name="logo">
                    <x-validation-error name="logo" />
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
@endsection