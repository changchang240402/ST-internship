@extends('layout.app')

@section('title', 'Edit Customer')

@section('content')
    <form action="{{ route('customers.update', ['customer' => $customer->id]) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="p-5">
            <h2 class="text-center">Edit Customer</h2>
            <div class="mb-3">
                <label for="inputName" class="form-label">Company Name</label>
                <input value="{{ old('company_name', $customer->company_name) }}" type="text" class="form-control"
                    id="inputName" name="company_name">
                @error('company_name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="inputName" class="form-label">Transaction Name</label>
                <input value="{{ old('transaction_name', $customer->transaction_name) }}" type="text"
                    class="form-control" id="inputName" name="transaction_name">
                @error('transaction_name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="inputAddress" class="form-label">Address</label>
                <input value="{{ old('address', $customer->address) }}" type="text" class="form-control"
                    id="inputAddress" name="address">
                @error('address')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="inputEmail" class="form-label">Email</label>
                <input value="{{ old('email', $customer->email) }}" type="email" class="form-control" id="inputEmail"
                    name="email">
                @error('email')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="inputPhone" class="form-label">Phone Number</label>
                <input value="{{ old('phone_number', $customer->phone_number) }}" type="text" class="form-control"
                    id="inputPhone" name="phone_number">
                @error('phone_number')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="inputFax" class="form-label">Fax</label>
                <input value="{{ old('fax', $customer->fax) }}" type="text" class="form-control" id="inputFax"
                    name="fax">
                @error('fax')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <!-- Modal Footer -->
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary" id="addEmployeeBtn">Edit Customer</button>
        </div>

    </form>
@endsection
