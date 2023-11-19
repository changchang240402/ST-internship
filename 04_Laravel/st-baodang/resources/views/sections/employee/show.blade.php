@extends('default')

@section('content')

    <h4 class="py-3 mb-4"><span class="text-muted fw-light"><a
                href="{{ route('employees.index') }}">Employees</a> / </span>Details</h4>

    <div class="card mb-4">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="mb-0">Employee details</h5>
            <a href="{{ route('employees.index') }}"><i class='bx bx-arrow-back'></i></a>
        </div>
        <div class="card-body">
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">ID</label>
                <div class="col-sm-10">
                    <p>{{ $employee->id }}</p>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Employee ID</label>
                <div class="col-sm-10">
                    <p>{{ $employee->employee_id }}</p>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">First Name</label>
                <div class="col-sm-10">
                    <p>{{ $employee->first_name }}</p>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Last Name</label>
                <div class="col-sm-10">
                    <p>{{ $employee->last_name }}</p>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Birthday</label>
                <div class="col-sm-10">
                    <p>{{ date('d-m-Y', strtotime($employee->birthday)) }}</p>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Start date</label>
                <div class="col-sm-10">
                    <p>{{ date('d-m-Y', strtotime($employee->start_date)) }}</p>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Address</label>
                <div class="col-sm-10">
                    <p>{{ $employee->address }}</p>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Phone</label>
                <div class="col-sm-10">
                    <p>{{ $employee->phone }}</p>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Base salary</label>
                <div class="col-sm-10">
                    <p>{{ $employee->base_salary }}</p>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Allowance</label>
                <div class="col-sm-10">
                    <p>{{ $employee->allowance }}</p>
                </div>
            </div>
        </div>
    </div>
@stop
