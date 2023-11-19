@extends('layout.app')
@section('title', 'Create Employee')
@section('PageName', 'Create Employee')
@section('content')
    <div class="card-header pb-0">
        <h6>Create New Employee</h6>
    </div>
    <form action="{{ route('employees.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="example-text-input" class="form-control-label">Employee ID</label>
            @error('employee_id')
                <span class="text-danger fst-italic fs-7">{{ $message }}</span>
            @enderror
            <input name="employee_id" class="form-control" type="text" value="{{ old('employee_id') }}"
                placeholder="Enter employee ID">
        </div>
        <div class="form-group">
            <label for="example-text-input" class="form-control-label">Last Name</label>
            @error('last_name')
                <span class="text-danger fst-italic fs-7">{{ $message }}</span>
            @enderror
            <input name="last_name" class="form-control" type="text" value="{{ old('last_name') }}"
                placeholder="Enter last name">
        </div>
        <div class="form-group">
            <label for="example-text-input" class="form-control-label">First Name</label>
            @error('first_name')
                <span class="text-danger fst-italic fs-7">{{ $message }}</span>
            @enderror
            <input name="first_name" class="form-control" type="text" value="{{ old('first_name') }}"
                placeholder="Enter first name">
        </div>
        <div class="form-group">
            <label for="example-search-input" class="form-control-label">Birthday</label>
            @error('birthday')
                <span class="text-danger fst-italic fs-7">{{ $message }}</span>
            @enderror
            <input name="birthday" class="form-control" data-provide="datepicker" id="datepicker" type="text"
                value="{{ old('birthday') }}" placeholder="Enter birthday">
        </div>
        <div class="form-group">
            <label for="example-search-input" class="form-control-label">Start Date</label>
            @error('start_date')
                <span class="text-danger fst-italic fs-7">{{ $message }}</span>
            @enderror
            <input name="start_date" class="form-control" data-provide="datepicker" id="startpicker" type="text"
                value="{{ old('start_date') }}" placeholder="Enter start work date">
        </div>
        <div class="form-group">
            <label for="example-text-input" class="form-control-label">Address</label>
            @error('address')
                <span class="text-danger fst-italic fs-7">{{ $message }}</span>
            @enderror
            <input name="address" class="form-control" type="text" value="{{ old('address') }}"
                placeholder="Enter address">
        </div>
        <div class="form-group">
            <label for="example-text-input" class="form-control-label">Phone</label>
            @error('phone')
                <span class="text-danger fst-italic fs-7">{{ $message }}</span>
            @enderror
            <input name="phone" class="form-control" type="text"value="{{ old('phone') }}" placeholder="Enter phone">
        </div>
        <div class="form-group">
            <label for="example-text-input" class="form-control-label">Base Salary</label>
            @error('base_salary')
                <span class="text-danger fst-italic fs-7">{{ $message }}</span>
            @enderror
            <input name="base_salary" class="form-control" type="number" value="{{ old('base_salary') }}"
                placeholder="Enter base salary">
        </div>
        <div class="form-group">
            <label for="example-text-input" class="form-control-label">Allowance</label>
            @error('allowance')
                <span class="text-danger fst-italic fs-7">{{ $message }}</span>
            @enderror
            <input name="allowance" class="form-control" type="number" value="{{ old('allowance') }}"
                placeholder="Enter allowance">
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
