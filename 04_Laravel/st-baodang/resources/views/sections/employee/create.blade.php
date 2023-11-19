@extends('default')

@section('content')

    <h4 class="py-3 mb-4"><span class="text-muted fw-light"><a
                href="{{ route('employees.index') }}">Employees</a> / </span>Create</h4>

    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">New employee</h5>
            <a href="{{ route('employees.index') }}"><i class='bx bx-arrow-back'></i></a>
        </div>
        <div class="card-body">
            <form method="POST" action="{{route('employees.store')}}">
                @csrf
                <div class="mb-3">
                    <label class="form-label" for="employee_id">Employee ID</label>
                    <input value="{{ old('employee_id') }}" name="employee_id" type="text" class="form-control"
                           id="employee_id"
                           placeholder="ST97"/>
                    @error('employee_id')
                    <div class="invalid-feedback" style="display:block;">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label" for="basic-default-fullname">Full Name</label>
                    <div class="input-group">
                        <input value="{{ old('first_name') }}" name="first_name" placeholder="First Name" type="text"
                               aria-label="First name"
                               class="form-control">
                        <input value="{{ old('last_name') }}" name="last_name" placeholder="Last Name" type="text"
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
                           value="{{old('start_date', \Carbon\Carbon::now())}}"
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
                           value="{{old('start_date', \Carbon\Carbon::now())}}"
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
                        placeholder="363 Nguyễn Hữu Thọ, Khuê Trung, Cẩm Lệ, Đà Nẵng">{{ old('address') }}</textarea>
                    @error('address')
                    <div class="invalid-feedback" style="display:block;">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label" for="phone">Phone No</label>
                    <input
                        name="phone"
                        type="text"
                        id="phone"
                        class="form-control phone-mask"
                        placeholder="0236 3626 989"
                        value="{{ old('phone') }}"
                    />
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
                            name="base_salary"
                            type="number"
                            id="base_salary"
                            class="form-control"
                            placeholder="4000000"
                            value="{{ old('base_salary') }}"
                        />
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
                            name="allowance"
                            type="number"
                            id="allowance"
                            class="form-control"
                            placeholder="0"
                            value="{{ old('allowance', 0) }}"
                        />
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
