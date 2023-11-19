@extends('layouts.auth')

@section('content')
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Begin Page Content -->
        <div class="container-fluid">
            <h1 class="h3 mb-2 text-gray-800">Add Function</h1>
            <div class="p-5">
                <form class="user" method="POST" action="{{ route('employees.store') }}">
                    @csrf
                    <div class="form-group">
                        <input type="text" name="employee_id" class="form-control form-control-user" placeholder="Id"
                            value="{{ old('employee_id') }}">
                        @error('employee_id')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="text" name="first_name" class="form-control form-control-user"
                            placeholder="First Name" value [="{{ old('first_name') }}" ]>
                        @error('first_name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="text" name="last_name" class="form-control form-control-user"
                            placeholder="Last Name" value [="{{ old('last_name') }}">
                        @error('last_name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="text" name="birthday" class="form-control form-control-user" placeholder="Birthday"
                            value [="{{ old('birthday') }}">
                        @error('birthday')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="text" name="start_date" class="form-control form-control-user"
                            placeholder="Start Date" value [="{{ old('start_date') }}">
                        @error('start_date')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="text" name="address" class="form-control form-control-user" placeholder="Address"
                            value [="{{ old('address') }}">
                        @error('address')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                            <input type="text" name="phone" class="form-control form-control-user" placeholder="Phone"
                                value [="{{ old('phone') }}">
                            @error('phone')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="text" name="base_salary" class="form-control form-control-user"
                                placeholder="Base Salary" value [="{{ old('base_salary') }}">
                            @error('base_salary')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="text" name="allowance" class="form-control form-control-user"
                                placeholder="Allowance" value [="{{ old('allowance') }}">
                            @error('allowance')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="button-container">
                            <button type="submit" class="btn btn-primary">
                                Add
                            </button>
                            <button type="button" class="btn btn-secondry"
                                onclick="window.location.href = '{{ route('employees.index') }}';">
                                Cancel
                            </button>
                        </div>
                </form>
            </div>
        </div>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    </html>
@endsection
