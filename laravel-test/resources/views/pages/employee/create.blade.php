@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            Add Employee
        </div>
        <div class="card-body">
            <form action="{{ route('employee.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="employeeName">Name</label>
                    <input type="text" class="form-control" id="employeeName" placeholder="" name="name" value="{{ old('name') }}">
                    <x-validation-error name="name" />
                </div>
                <div class="form-group">
                    <label for="employeeEmail">Email address</label>
                    <input type="email" class="form-control" id="employeeEmail" placeholder="name@example.com" name="email" value="{{ old('email') }}">
                    <x-validation-error name="email" />
                </div>
                <div class="form-group">
                    <label for="employeeCompany">Company</label>
                    <select name="company_id" id="employeeCompanySelect" class="form-control">
                        <option value=""></option>
                    </select>
                    <x-validation-error name="company_id" />
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        $('#employeeCompanySelect').select2({
            allowClear: true,
            ajax: {
                type: 'GET',
                url: '{{ route("company.select") }}',
                dataType: 'json',
                data: function (params) {
                    return {
                        term: params.term || '',
                        page: params.page || 1
                    }
                },
                processResults: function(result){
                    return result;
                },
                cache: true
            }
        });
    });
</script>
@endsection