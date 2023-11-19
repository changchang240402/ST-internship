@extends('admin.layouts.main')

@section('pageName')
   <a href="#">Edit Employee</a>
@endsection

@section('title')
   <a href="#">Edit Employee</a>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card card-body">
            <form class="form-horizontal mt-4" method="POST" action="{{ route('employees.update',['employee' => $employee['id']]) }}">
                @csrf
                @method('PUT')
                <input type="hidden" name="employee_id" value="{{ $employee['id'] }}">
                <div class="form-group">
                    <label>Last Name</label>
                    <input type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name', $employee['last_name']) }}">
                    @error('last_name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>First Name</label>
                    <input type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name', $employee['first_name']) }}">
                    @error('first_name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Birthday</label>
                    <input type="text" class="form-control @error('birthday') is-invalid @enderror" name="birthday" value="{{ old('birthday', $employee['birthday']) }}">
                    @error('birthday')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="start_date">Start Date</label>
                    <input type="text" class="form-control @error('start_date') is-invalid @enderror" name="start_date" value="{{ old('start_date', $employee['start_date']) }}">
                    @error('start_date')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address', $employee['address']) }}">
                    @error('address')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone', $employee['phone']) }}">
                    @error('phone')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="base_salary">Base Salary</label>
                    <input type="text" class="form-control @error('base_salary') is-invalid @enderror" name="base_salary" value="{{ old('base_salary', $employee['base_salary']) }}">
                    @error('base_salary')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="allowance">Allowance</label>
                    <input type="text" class="form-control @error('allowance') is-invalid @enderror" name="allowance" value="{{ old('allowance', $employee['allowance']) }}">
                    @error('allowance')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <button class="btn btn-success text-white" type="submit">Update</button>
                    </div>
                </div>               
            </form>
        </div>
    </div>
</div>
@endsection
