@extends('home')
@section('title', 'Create Employee')
@section('pageName', 'Create Employee')
@section('content')
<div class="col-xl">
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Create New Employee</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('employees.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label" for="basic-icon-default-employeeid">Employee ID</label>
                    <div class="input-group input-group-merge">
                        <span id="basic-icon-default-employeeid2" class="input-group-text">
                            <i class='bx bxs-barcode'></i>
                        </span>
                        <input type="text" class="form-control" id="basic-icon-default-employeeid" name="employee_id"
                            value="{{ old('employee_id') }}" placeholder="A001" aria-label="A001"
                            aria-describedby="basic-icon-default-employeeid2" />
                        @error('employee_id')
                            <div class="invalid-feedback" style="display: block">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="basic-icon-default-lastname">Last Name</label>
                    <div class="input-group input-group-merge">
                        <span id="basic-icon-default-lastname2" class="input-group-text">
                            <i class='bx bx-user-circle'></i>
                        </span>
                        <input type="text" class="form-control" id="basic-icon-default-lastname" name="last_name"
                            value="{{ old('last_name') }}" placeholder="Đào" aria-label="Đào"
                            aria-describedby="basic-icon-default-lastname2" />
                        @error('last_name')
                            <div class="invalid-feedback" style="display: block">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="basic-icon-default-firstname">First Name</label>
                    <div class="input-group input-group-merge">
                        <span id="basic-icon-default-firstname2" class="input-group-text">
                            <i class='bx bx-user'></i>
                        </span>
                        <input type="text" id="basic-icon-default-firstname" class="form-control" name="first_name"
                            value="{{ old('first_name') }}" placeholder="Thủy Trang" aria-label="Thủy Trang"
                            aria-describedby="basic-icon-default-firstname2" />
                        @error('first_name')
                            <div class="invalid-feedback" style="display: block">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="basic-icon-default-birthday">Birthday</label>
                    <div class="input-group input-group-merge">
                        <span id="basic-icon-default-birthday2" class="input-group-text">
                            <i class='bx bx-calendar'></i>
                        </span>
                        <input type="date" id="basic-icon-default-birthday" class="form-control" name="birthday"
                            value="{{ old('birthday') }}" aria-describedby="basic-icon-default-birthday2" />
                        @error('birthday')
                            <div class="invalid-feedback" style="display: block">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="basic-icon-default-startdate">Start Date</label>
                    <div class="input-group input-group-merge">
                        <span id="basic-icon-default-startdate2" class="input-group-text">
                            <i class='bx bx-calendar-check'></i>
                        </span>
                        <input type="date" id="basic-icon-default-startdate" class="form-control" name="start_date"
                            value="{{ old('start_date') }}" aria-describedby="basic-icon-default-startdate2" />
                        @error('start_date')
                            <div class="invalid-feedback" style="display: block">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="basic-icon-default-address">Address</label>
                    <div class="input-group input-group-merge">
                        <span id="basic-icon-default-address2" class="input-group-text">
                            <i class="bx bx-buildings"></i>
                        </span>
                        <input type="text" id="basic-icon-default-address" class="form-control" name="address"
                            value="{{ old('address') }}" placeholder="Đà Nẵng" aria-label="Đà Nẵng"
                            aria-describedby="basic-icon-default-address2" />
                        @error('address')
                            <div class="invalid-feedback" style="display: block">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="basic-icon-default-phone">Phone</label>
                    <div class="input-group input-group-merge">
                        <span id="basic-icon-default-phone2" class="input-group-text">
                            <i class="bx bx-phone"></i>
                        </span>
                        <input type="text" id="basic-icon-default-phone" class="form-control phone-mask"
                            name="phone" value="{{ old('phone') }}" placeholder="0658 799 894"
                            aria-label="0658 799 894" aria-describedby="basic-icon-default-phone2" />
                        @error('phone')
                            <div class="invalid-feedback" style="display: block">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="basic-icon-default-basesalary">Base Salary</label>
                    <div class="input-group input-group-merge">
                        <span class="input-group-text">
                            <i class='bx bx-money'></i>
                        </span>
                        <input type="text" id="basic-icon-default-email" class="form-control" name="base_salary"
                            value="{{ old('base_salary') }}" placeholder="10000000" aria-label="10000000"
                            aria-describedby="basic-icon-default-email2" />
                        @error('base_salary')
                            <div class="invalid-feedback" style="display: block">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="basic-icon-default-allowance">Allowance</label>
                    <div class="input-group input-group-merge">
                        <span id="basic-icon-default-allowance2" class="input-group-text">
                            <i class='bx bx-dollar-circle'></i>
                        </span>
                        <input id="basic-icon-default-allowance" class="form-control" name="allowance"
                            value="{{ old('allowance') }}" placeholder="500000" aria-label="500000"
                            aria-describedby="basic-icon-default-fax2" />
                        @error('allowance')
                            <div class="invalid-feedback" style="display: block">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <a href="{{ route('employees.index') }}" type="submit"
                    class="btn rounded-pill btn-outline-warning">Cancel</a>
                <button type="submit" class="btn rounded-pill btn-outline-success">Save</button>
            </form>
        </div>
    </div>
</div>
@endsection
