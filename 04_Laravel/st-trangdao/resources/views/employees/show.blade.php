@extends('home')
@section('title', 'Show Details Employees')
@section('pageName', 'Show Details Employees')
@section('content')
<div class="col-xl">
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Profile Details Employee</h5>
        </div>
        <div class="card-body">
            <form href="{{ route('employees.show', ['employee' => $employee['id']]) }} ">
                <div class="mb-3">
                    <label for="html5-text-input" class="col-md-2 col-form-label">ID : </label>
                    <div class="col-md-10">
                        <span id="basic-icon-default-employeeid2" class="input-group-text">
                            <i class='bx bx-id-card'></i>
                            {{ $employee['id'] }}
                        </span>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="html5-text-input" class="col-md-2 col-form-label">Employee ID : </label>
                    <div class="col-md-10">
                        <span id="basic-icon-default-employeeid2" class="input-group-text">
                            <i class='bx bxs-barcode'></i>
                            {{ $employee['employee_id'] }}
                        </span>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="html5-text-input" class="col-md-2 col-form-label">Full Name : </label>
                    <div class="col-md-10">
                        <span id="basic-icon-default-lastname2" class="input-group-text">
                            <i class='bx bx-user-circle'></i>
                            {{ $employee['last_name'] . ' ' . $employee['first_name'] }}
                        </span>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="html5-text-input" class="col-md-2 col-form-label">Birthday : </label>
                    <div class="col-md-10">
                        <span id="basic-icon-default-birthday2" class="input-group-text">
                            <i class='bx bx-calendar'></i>
                            {{ date('d-m-Y', strtotime($employee['birthday'])) }}
                        </span>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="html5-text-input" class="col-md-2 col-form-label">Start Date : </label>
                    <div class="col-md-10">
                        <span id="basic-icon-default-startdate2" class="input-group-text">
                            <i class='bx bx-calendar-check'></i>
                            {{ date('d-m-Y', strtotime($employee['start_date'])) }}
                        </span>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="html5-text-input" class="col-md-2 col-form-label">Address : </label>
                    <div class="col-md-10">
                        <span id="basic-icon-default-address2" class="input-group-text">
                            <i class="bx bx-buildings"></i>
                            {{ $employee['address'] }}
                        </span>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="html5-text-input" class="col-md-2 col-form-label">Phone : </label>
                    <div class="col-md-10">
                        <span id="basic-icon-default-phone2" class="input-group-text"><i
                                class="bx bx-phone"></i>{{ $employee['phone'] }}</span>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="html5-text-input" class="col-md-2 col-form-label">Base Salary : </label>
                    <div class="col-md-10">
                        <span class="input-group-text">
                            <i class='bx bx-money'></i>
                            {{ $employee['base_salary'] }}
                        </span>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="html5-text-input" class="col-md-2 col-form-label">Allowance : </label>
                    <div class="col-md-10">
                        <span id="basic-icon-default-allowance2" class="input-group-text">
                            <i class='bx bx-dollar-circle'></i>
                            {{ $employee['allowance'] }}
                        </span>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
