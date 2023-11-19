@extends('admin.layouts.admin')
@section('content')
    <!-- partial -->
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <form method="post" action="{{ route('employees.update', ['employee' => $employee['id']]) }}">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="employee_id">Employee ID</label>
                                    <input type="text" class="form-control" id="employee_id" name="employee_id"
                                        placeholder="Employee ID"
                                        value="{{ old('employee_id', $employee['employee_id']) }}">
                                    @error('employee_id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col">
                                            <label for="last_name">Last Name</label>
                                            <input type="text" class="form-control" id="last_name" name="last_name"
                                                placeholder="Last Name"
                                                value="{{ old('last_name', $employee['last_name']) }}">
                                            @error('last_name')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col">
                                            <label for="first_name">First Name</label>
                                            <input type="text" class="form-control" id="first_name" name="first_name"
                                                placeholder="First Name"
                                                value="{{ old('first_name', $employee['first_name']) }}">
                                            @error('first_name')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col">
                                            <label for="phone">Phone Number</label>
                                            <input type="text" id="phone" name="phone" class="form-control"
                                                placeholder="Phone Number" value="{{ old('phone', $employee['phone']) }}">
                                            @error('phone')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col">
                                            <label for="address">Address</label>
                                            <input type="text" id="address" name="address" class="form-control"
                                                placeholder="Address" value="{{ old('address', $employee['address']) }}">
                                            @error('address')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col">
                                            <label for="birthday">Birthday</label>
                                            <input type="text" class="form-control" id="birthday" name="birthday"
                                                value="{{ old('birthday', $employee['birthday']) }}">
                                            @error('birthday')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col">
                                            <label for="start_date">Start Date</label>
                                            <input type="text" class="form-control" id="start_date" name="start_date"
                                                value="{{ old('start_date', $employee['start_date']) }}">
                                            @error('start_date')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col">
                                            <label for="base_salary">Base Salary</label>
                                            <input type="number" class="form-control" id="base_salary" name="base_salary"
                                                placeholder="Base Salary"
                                                value="{{ old('base_salary', $employee['base_salary']) }}">
                                            @error('base_salary')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col">
                                            <label for="allowance">Allowance</label>
                                            <input type="number" class="form-control" id="allowance" name="allowance"
                                                placeholder="Allowance"
                                                value="{{ old('allowance', $employee['allowance']) }}">
                                            @error('allowance')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-info">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('scripts')
    <script src="{{ asset('admin/assets/vendors/js/vendor.bundle.base.js') }} "></script>
    <script src="{{ asset('admin/assets/vendors/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/jquery.cookie.js') }}"></script>
    <script src="{{ asset('admin/assets/js/off-canvas.js') }}"></script>
    <script src="{{ asset('admin/assets/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('admin/assets/js/misc.js') }}"></script>
    <script src="{{ asset('admin/assets/js/dashboard.js') }}"></script>
    <script src="{{ asset('admin/assets/js/todolist.js') }}"></script>
@stop
