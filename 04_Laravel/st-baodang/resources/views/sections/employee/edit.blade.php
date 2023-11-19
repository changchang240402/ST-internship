@extends('default')

@section('content')

    <h4 class="py-3 mb-4"><span class="text-muted fw-light"><a
                href="{{ route('employees.index') }}">Employees</a> / </span>Edit</h4>

    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Editing employee</h5>
            <a href="{{ route('employees.index') }}"><i class='bx bx-arrow-back'></i></a>
        </div>
        <div class="card-body">
            <form method="POST" action="{{route('employees.update', $employee->id )}}">
                @csrf
                @method('PUT')
                <input style="display: none" name="id" value="{{ $employee->id }}">
                @error('id')
                <div class="invalid-feedback" style="display:block;">
                    {{ $message }}
                </div>
                @enderror
                <div class="mb-3">
                    <label class="form-label" for="employee_id">Employee ID</label>
                    <input value="{{ old('employee_id', $employee->employee_id) }}" name="employee_id" type="text"
                           class="form-control"
                           id="employee_id"
                           placeholder="ST97"/>
                    @error('employee_id')
                    <div class="invalid-feedback" style="display:block;">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Full Name</label>
                    <div class="input-group">
                        <input value="{{ old('first_name', $employee->first_name) }}" name="first_name"
                               placeholder="First Name"
                               type="text" aria-label="First name"
                               class="form-control">
                        <input value="{{ old('last_name', $employee->last_name) }}" name="last_name"
                               placeholder="Last Name" type="text"
                               aria-label="Last name"
                               class="form-control">
                        @error('first_name')
                        <div class="invalid-feedback" style="display:block;">
                            {{ $message }}
                        </div>
                        @enderror
                        @error('last_name')
                        <div class="invalid-feedback" style="display:block;">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <label for="birthday" class="form-label">Birthday</label>
                    <input name="birthday" class="form-control" type="datetime-local"
                           value="{{ old('birthday', $employee->birthday) }}"
                           id="birthday">
                    @error('birthday')
                    <div class="invalid-feedback" style="display:block;">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="start_date" class="form-label">Start date</label>
                    <input name="start_date" class="form-control" type="datetime-local"
                           value="{{ old('start_date', $employee->start_date) }}"
                           id="start_date">
                    @error('start_date')
                    <div class="invalid-feedback" style="display:block;">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label" for="address">Address</label>
                    <textarea
                        name="address"
                        style="resize: none"
                        id="address"
                        class="form-control"
                        placeholder="363 Nguyễn Hữu Thọ, Khuê Trung, Cẩm Lệ, Đà Nẵng">{{ old('address', $employee->address) }}</textarea>
                    @error('address')
                    <div class="invalid-feedback" style="display:block;">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label" for="phone">Phone No</label>
                    <input
                        value="{{ old('phone', $employee->phone) }}"
                        name="phone"
                        type="text"
                        id="phone"
                        class="form-control phone-mask"
                        placeholder="0236 3626 989"/>
                    @error('phone')
                    <div class="invalid-feedback" style="display:block;">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label" for="base_salary">Base salary</label>
                    <div class="input-group input-group-merge">
                        <input
                            value="{{ old('base_salary', $employee->base_salary) }}"
                            name="base_salary"
                            type="number"
                            id="base_salary"
                            class="form-control"
                            placeholder="4000000"/>
                        @error('base_salary')
                        <div class="invalid-feedback" style="display:block;">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label" for="allowance">Allowance</label>
                    <div class="input-group input-group-merge">
                        <input
                            value="{{ old('allowance', $employee->allowance) }}"
                            name="allowance"
                            type="number"
                            id="allowance"
                            class="form-control"
                            placeholder="0"/>
                        @error('allowance')
                        <div class="invalid-feedback" style="display:block;">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

@stop
