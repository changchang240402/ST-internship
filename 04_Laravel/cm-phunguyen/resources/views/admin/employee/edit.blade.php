@extends('layouts.auth')

@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <body id="page-top">
        <!-- Page Wrapper -->
        <div id="wrapper">
            <!-- Begin Page Content -->
            <div class="container-fluid">
                <h1 class="h3 mb-2 text-gray-800">Edit Function</h1>
                <div class="p-5">
                    <form class="user" method="POST"
                        action="{{ route('employees.update', ['employee' => $employee['id']]) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <h6>Employee Id</h6>
                            <input type="text" name="employee_id" class="form-control form-control-user" placeholder="Id"
                                value="{{ old('employee_id', $employee['employee_id']) }}">
                            @error('employee_id')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <h6>First Name</h6>
                            <input type="text" name="first_name" class="form-control form-control-user"
                                placeholder="First Name" value="{{ old('first_name', $employee['first_name']) }}">
                            @error('first_name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <h6>Last Name</h6>
                            <input type="text" name="last_name" class="form-control form-control-user"
                                placeholder="Last Name" value="{{ old('last_name', $employee['last_name']) }}">
                            @error('last_name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <h6>Birthday</h6>
                            <input type="text" name="birthday" class="form-control form-control-user"
                                placeholder="Birthday" value="{{ old('birthday', $employee['birthday']) }}">
                            @error('birthday')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <h6>Start Date</h6>
                            <input type="text" name="start_date" class="form-control form-control-user"
                                placeholder="Start Date" value="{{ old('start_date', $employee['start_date']) }}">
                            @error('start_date')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <h6>Address</h6>
                            <input type="text" name="address" class="form-control form-control-user"
                                placeholder="Address" value="{{ old('address', $employee['address']) }}">
                            @error('address')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <h6>Phone</h6>
                            <input type="text" name="phone" class="form-control form-control-user" placeholder="Phone"
                                value="{{ old('phone', $employee['phone']) }}">
                            @error('phone')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <h6>Base Salary</h6>
                            <input type="text" name="base_salary" class="form-control form-control-user"
                                placeholder="Base Salary" value="{{ old('base_salary', $employee['base_salary']) }}">
                            @error('base_salary')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <h6>Allowance</h6>
                            <input type="text" name="allowance" class="form-control form-control-user"
                                placeholder="Allowance" value="{{ old('allowance', $employee['allowance']) }}">
                            @error('allowance')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="button-container">
                            <button type="submit" class="btn btn-primary">
                                Update
                            </button>
                            <button type="button" class="btn btn-secondary"
                                onclick="window.location.href = '{{ route('employees.index') }}';">
                                Cancel
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>

    </html>
@endsection
