@extends('layout.app')

@section('title', 'Edit Employee')

@section('content')
    <form id="employeeForm" action="{{ route('employees.update', ['employee' => $employee->id]) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="p-5">
            <div class="mb-3">
                <h2 class="text-center">Edit employee</h2>
                <label for="inputId" class="form-label">Employee Id</label>
                <input value="{{ old('employee_id', $employee->employee_id) }}" type="text" class="form-control"
                    id="inputId" name="employee_id">
                @error('employee_id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="inputName" class="form-label">Last Name</label>
                <input value="{{ old('last_name', $employee->last_name) }}" type="text" class="form-control"
                    id="inputName" name="last_name">
                @error('last_name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="inputName" class="form-label">First Name</label>
                <input value="{{ old('first_name', $employee->first_name) }}" type="text" class="form-control"
                    id="inputName" name="first_name">
                @error('first_name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="inputBirthDay" class="form-label">BirthDay</label>
                <input value="{{ old('birthday', date('Y-m-d', strtotime($employee->birthday))) }}" type="date"
                    class="form-control" id="inputBirthDay" name="birthday">
                @error('birthday')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="inputStartDate" class="form-label">Start Date</label>
                <input value="{{ old('start_date', date('Y-m-d', strtotime($employee->start_date))) }}" type="date"
                    class="form-control" id="inputStartDate" name="start_date">
                @error('start_date')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="inputPosition" class="form-label">Address</label>
                <input value="{{ old('address', $employee->address) }}" type="text" class="form-control"
                    id="inputPosition" name="address">
                @error('address')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="inputPhone" class="form-label">Phone</label>
                <input value="{{ old('phone', $employee->phone) }}" type="text" class="form-control"
                    id="inputPhone" name="phone">
                @error('phone')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="inputSalary" class="form-label">Base Salary</label>
                <input value="{{ old('base_salary', $employee->base_salary) }}" type="number" class="form-control"
                    id="inputSalary" name="base_salary">
                @error('base_salary')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="inputAllowance" class="form-label">Allowance</label>
                <input value="{{ old('allowance', $employee->allowance) }}" type="number" class="form-control"
                    id="inputAllowance" name="allowance">
                @error('allowance')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

        </div>

        <!-- Modal Footer -->
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary" id="addEmployeeBtn">Edit Employee</button>
        </div>

    </form>
@endsection
