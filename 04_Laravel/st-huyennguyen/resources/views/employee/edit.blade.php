@extends('layout.app')
@section('title', 'Edit Employee')
@section('PageName', 'Edit Employee')
@section('content')
    <div class="card-header pb-0">
        <h6>Edit Employee</h6>
    </div>
    <form action="{{ route('employees.update', ['employee' => $employee['id']]) }}" method="POST">
        @method('PUT')
        @csrf
        <input type="hidden" name="id" value="{{ $employee['id'] }}">
        <div class="form-group">
            <label for="example-text-input" class="form-control-label">Employee ID</label>
            @error('employee_id')
                <span class="text-danger fst-italic fs-7">{{ $message }}</span>
            @enderror
            <input name="employee_id" class="form-control" type="text" value="{{ old('employee_id', $employee['employee_id']) }}">
        </div>
        <div class="form-group">
            <label for="example-text-input" class="form-control-label">Last Name</label>
            @error('last_name')
                <span class="text-danger fst-italic fs-7">{{ $message }}</span>
            @enderror
            <input name="last_name" class="form-control" type="text" value="{{ old('last_name', $employee['last_name']) }}">
        </div>
        <div class="form-group">
            <label for="example-text-input" class="form-control-label">First Name</label>
            @error('first_name')
                <span class="text-danger fst-italic fs-7">{{ $message }}</span>
            @enderror
            <input name="first_name" class="form-control" type="text" value="{{ old('first_name', $employee['first_name']) }}">
        </div>
        <div class="form-group">
            <label for="example-search-input" class="form-control-label">Birthday</label>
            @error('birthday')
                <span class="text-danger fst-italic fs-7">{{ $message }}</span>
            @enderror
            <input name="birthday" class="form-control" data-provide="datepicker" id="datepicker" type="text"
                value="{{ old('birthday', $employee['birthday']) }}">
        </div>
        <div class="form-group">
            <label for="example-search-input" class="form-control-label">Start Date</label>
            @error('start_date')
                <span class="text-danger fst-italic fs-7">{{ $message }}</span>
            @enderror
            <input name="start_date" class="form-control" data-provide="datepicker" id="startpicker" type="text"
                value="{{ old('start_date', $employee['start_date']) }}">
        </div>
        <div class="form-group">
            <label for="example-text-input" class="form-control-label">Address</label>
            @error('address')
                <span class="text-danger fst-italic fs-7">{{ $message }}</span>
            @enderror
            <input name="address" class="form-control" type="text" value="{{ old('address', $employee['address']) }}">
        </div>
        <div class="form-group">
            <label for="example-text-input" class="form-control-label">Phone</label>
            @error('phone')
                <span class="text-danger fst-italic fs-7">{{ $message }}</span>
            @enderror
            <input name="phone" class="form-control" type="text" value="{{ old('phone', $employee['phone']) }}">
        </div>
        <div class="form-group">
            <label for="example-text-input" class="form-control-label">Base Salary</label>
            @error('base_salary')
                <span class="text-danger fst-italic fs-7">{{ $message }}</span>
            @enderror
            <input name="base_salary" class="form-control" type="number" value="{{ old('base_salary', $employee['base_salary']) }}">
        </div>
        <div class="form-group">
            <label for="example-text-input" class="form-control-label">Allowance</label>
            @error('allowance')
                <span class="text-danger fst-italic fs-7">{{ $message }}</span>
            @enderror
            <input name="allowance" class="form-control" type="number" value="{{ old('allowance', $employee['allowance']) }}">
        </div>
        <div class="form-group col-12 row">
            <div class="col-6">
                <a href="{{ url()->previous() }}" type="button" class="btn bg-gradient-danger">Cancel</a>
            </div>
            <div class="col-6 text-end">
                <input type="submit" value="submit" class="btn bg-gradient-dark mb-0">
            </div>
        </div>
    </form>
@endsection
@section('styles')
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker3.min.css">
@endsection
@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <script src="{{ asset('assets/js/data-picker.js') }}"></script>
@endsection
