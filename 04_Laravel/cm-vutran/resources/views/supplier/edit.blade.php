@extends('layout.app')

@section('title', 'Add supplier')

@section('content')
    <form id="supplierForm" action="{{ route('suppliers.update', ['supplier' => $supplier->id]) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="p-5">
            <h2 class="text-center">Edit supplier</h2>
            <div class="mb-3">
                <label for="inputId" class="form-label">Company Id</label>
                <input value="{{ old('company_id', $supplier->company_id) }}" type="text" class="form-control"
                    id="inputId" name="company_id">
                @error('company_id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="inputName" class="form-label">Company Name</label>
                <input value="{{ old('company_name', $supplier->company_name) }}" type="text" class="form-control"
                    id="inputName" name="company_name">
                @error('company_name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="inputPosition" class="form-label">Transaction Name</label>
                <input value="{{ old('transaction_name', $supplier->transaction_name) }}" type="text"
                    class="form-control" id="inputPosition" name="transaction_name">
                @error('transaction_name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="inputOffice" class="form-label">Address</label>
                <input value="{{ old('address', $supplier->address) }}" type="text" class="form-control"
                    id="inputOffice" name="address">
                @error('address')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="inputAge" class="form-label">Email</label>
                <input value="{{ old('email', $supplier->email) }}" type="email" class="form-control" id="inputAge"
                    name="email">
                @error('email')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="inputStartDate" class="form-label">Phone Number</label>
                <input value="{{ old('phone_number', $supplier->phone_number) }}" type="text" class="form-control"
                    id="inputStartDate" name="phone_number">
                @error('phone_number')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="inputSalary" class="form-label">Fax</label>
                <input value="{{ old('fax', $supplier->fax) }}" type="text" class="form-control" id="inputSalary"
                    name="fax">
                @error('fax')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <!-- Modal Footer -->
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary" id="addsupplierBtn">Edit supplier</button>
        </div>

    </form>
@endsection
