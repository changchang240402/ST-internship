@extends('home')
@section('title', 'Edit Employee')
@section('pageName', 'Edit Employee')
@section('content')
    <div class="col-xl">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="card-header">Edit Employee</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('employees.update', ['employee' => $employee['id']]) }}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="mb-3 row">
                        <label for="html5-text-input" class="col-md-2 col-form-label">ID</label>
                        <div class="col-md-10">
                            <span id="basic-icon-default-categoryid2" class="fab fa-angular fa-lg text-danger me-3">
                                {{ $employee['id'] }}
                            </span>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="html5-text-input" class="col-md-2 col-form-label">Employee ID</label>
                        <div class="col-md-10">
                            <input class="form-control" type="text" name="employee_id"
                                value="{{ old('employee_id', $employee['employee_id']) }}" id="html5-search-input" />
                            @error('employee_id')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="html5-search-input" class="col-md-2 col-form-label">Last Name</label>
                        <div class="col-md-10">
                            <input class="form-control" type="text" name="last_name"
                                value="{{ old('last_name', $employee['last_name']) }}" id="html5-search-input" />
                            @error('last_name')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="html5-search-input" class="col-md-2 col-form-label">First Name</label>
                        <div class="col-md-10">
                            <input class="form-control" type="text" name="first_name"
                                value="{{ old('first_name', $employee['first_name']) }}" id="html5-search-input" />
                            @error('first_name')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="html5-search-input" class="col-md-2 col-form-label">Birthday</label>
                        <div class="col-md-10">
                            <input class="form-control" type="date" name="birthday"
                                value="{{ old('birthday', date('Y-m-d', strtotime($employee['birthday']))) }}"
                                id="html5-search-input" />
                            @error('birthday')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="html5-search-input" class="col-md-2 col-form-label">Start Date</label>
                        <div class="col-md-10">
                            <input class="form-control" type="date" name="start_date"
                                value="{{ old('start_date', date('Y-m-d', strtotime($employee['start_date']))) }}"
                                id="html5-search-input" />
                            @error('start_date')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="html5-search-input" class="col-md-2 col-form-label">Address</label>
                        <div class="col-md-10">
                            <input class="form-control" type="text" name="address"
                                value="{{ old('address', $employee['address']) }}" id="html5-search-input" />
                            @error('address')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="html5-search-input" class="col-md-2 col-form-label">Phone</label>
                        <div class="col-md-10">
                            <input class="form-control" type="text" name="phone"
                                value="{{ old('phone', $employee['phone']) }}" id="html5-search-input" />
                            @error('phone')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="html5-search-input" class="col-md-2 col-form-label">Base Salary</label>
                        <div class="col-md-10">
                            <input class="form-control" type="text" name="base_salary"
                                value="{{ old('base_salary', $employee['base_salary']) }}" id="html5-search-input" />
                            @error('base_salary')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="html5-search-input" class="col-md-2 col-form-label">Allowance</label>
                        <div class="col-md-10">
                            <input class="form-control" type="text" name="allowance"
                                value="{{ old('base_salary', $employee['allowance']) }}"
                                id="html5-search-input" />
                            @error('allowance')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <a href="" type="submit" class="btn rounded-pill btn-outline-warning">Cancel</a>
                    <input type="hidden" name="id" value="{{ $employee['id'] }}">
                    <button type="submit" class="btn rounded-pill btn-outline-success">Edit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
