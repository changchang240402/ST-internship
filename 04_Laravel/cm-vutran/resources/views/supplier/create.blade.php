@extends('layout.app')

@section('title', 'Add Supplier')

@section('content')
    <form id="supplierForm" action="{{ route('suppliers.store') }}" method="POST">
        @csrf
        <div class="p-5">
            <h2 class="text-center">Add Supplier</h2>
            <div class="mb-3">
                <label for="inputId" class="form-label">Company Id</label>
                <input value="{{ old('company_id') }}" type="text" class="form-control" id="inputId" name="company_id">
                @error('company_id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="inputName" class="form-label">Company Name</label>
                <input value="{{ old('company_name') }}" type="text" class="form-control" id="inputName"
                    name="company_name">
                @error('company_name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="inputTransaction " class="form-label">Transaction Name</label>
                <input value="{{ old('transaction_name') }}" type="text" class="form-control" id="inputTransaction "
                    name="transaction_name">
                @error('transaction_name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="inputOffice" class="form-label">Address</label>
                <input value="{{ old('address') }}" type="text" class="form-control" id="inputOffice" name="address">
                @error('address')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="inputEmail" class="form-label">Email</label>
                <input value="{{ old('email') }}" type="email" class="form-control" id="inputEmail" name="email">
                @error('email')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="inputPhone" class="form-label">Phone Number</label>
                <input value="{{ old('phone_number') }}" type="text" class="form-control" id="inputPhone"
                    name="phone_number">
                @error('phone_number')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="inputFax" class="form-label">Fax</label>
                <input value="{{ old('fax') }}" type="text" class="form-control" id="inputFax" name="fax">
                @error('fax')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <!-- Modal Footer -->
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary" id="addsupplierBtn">Add supplier</button>
        </div>

    </form>
@endsection
