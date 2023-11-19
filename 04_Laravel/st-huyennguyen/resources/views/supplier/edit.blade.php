@extends('layout.app')
@section('title', 'Edit supplier')
@section('PageName', 'Edit supplier')
@section('content')
    <div class="card-header pb-0">
        <h6>Edit supplier</h6>
    </div>
    <form action="{{ route('suppliers.update', ['supplier' => $supplier['id']]) }}" method="POST">
        @method('PUT')
        @csrf
        <input type="hidden" name="id" value="{{ $supplier['id'] }}">
        <div class="form-group">
            <label for="example-text-input" class="form-control-label">Company ID</label>
            @error('company_id')
                <span class="text-danger fst-italic fs-7">{{ $message }}</span>
            @enderror
            <input name="company_id" class="form-control" type="text"
                value="{{ old('company_id', $supplier['company_id']) }}">
        </div>
        <div class="form-group">
            <label for="example-text-input" class="form-control-label">Company Name</label>
            @error('company_name')
                <span class="text-danger fst-italic fs-7">{{ $message }}</span>
            @enderror
            <input name="company_name" class="form-control" type="text"
                value="{{ old('company_name', $supplier['company_name']) }}">
        </div>
        <div class="form-group">
            <label for="example-search-input" class="form-control-label">Transaction Name</label>
            @error('transaction_name')
                <span class="text-danger fst-italic fs-7">{{ $message }}</span>
            @enderror
            <input name="transaction_name" class="form-control" type="text"
                value="{{ old('transaction_name', $supplier['transaction_name']) }}">
        </div>
        <div class="form-group">
            <label for="example-text-input" class="form-control-label">Address</label>
            @error('address')
                <span class="text-danger fst-italic fs-7">{{ $message }}</span>
            @enderror
            <input name="address" class="form-control" type="text" value="{{ old('address', $supplier['address']) }}">
        </div>
        <div class="form-group">
            <label for="example-email-input" class="form-control-label">Email</label>
            @error('email')
                <span class="text-danger fst-italic fs-7">{{ $message }}</span>
            @enderror
            <input name="email" class="form-control" type="email" value="{{ old('email', $supplier['email']) }}">
        </div>
        <div class="form-group">
            <label for="example-text-input" class="form-control-label">Phone</label>
            @error('phone')
                <span class="text-danger fst-italic fs-7">{{ $message }}</span>
            @enderror
            <input name="phone" class="form-control" type="text" value="{{ old('phone', $supplier['phone']) }}">
        </div>
        <div class="form-group">
            <label for="example-text-input" class="form-control-label">Fax</label>
            @error('fax')
                <span class="text-danger fst-italic fs-7">{{ $message }}</span>
            @enderror
            <input name="fax" class="form-control" type="text" value="{{ old('fax', $supplier['fax']) }}">
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
