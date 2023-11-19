@extends('layout.app')
@section('title', 'Create Supplier')
@section('PageName', 'Create Supplier')
@section('content')
    <div class="card-header pb-0">
        <h6>Create New Supplier</h6>
    </div>
    <form action="{{ route('suppliers.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="example-text-input" class="form-control-label">Company ID</label>
            @error('company_id')
                <span class="text-danger fst-italic fs-7">{{ $message }}</span>
            @enderror
            <input name="company_id" class="form-control" type="text" value="{{ old('company_id') }}" placeholder="Enter company ID">
        </div>
        <div class="form-group">
            <label for="example-text-input" class="form-control-label">Company Name</label>
            @error('company_name')
                <span class="text-danger fst-italic fs-7">{{ $message }}</span>
            @enderror
            <input name="company_name" class="form-control" type="text" value="{{ old('company_name') }}" placeholder="Enter company name">
        </div>
        <div class="form-group">
            <label for="example-search-input" class="form-control-label">Transaction Name</label>
            @error('transaction_name')
                <span class="text-danger fst-italic fs-7">{{ $message }}</span>
            @enderror
            <input name="transaction_name" class="form-control" type="text" value="{{ old('transaction_name') }}" placeholder="Enter transaction name">
        </div>
        <div class="form-group">
            <label for="example-text-input" class="form-control-label">Address</label>
            @error('address')
                <span class="text-danger fst-italic fs-7">{{ $message }}</span>
            @enderror
            <input name="address" class="form-control" type="text" value="{{ old('address') }}" placeholder="Enter address">
        </div>
        <div class="form-group">
            <label for="example-email-input" class="form-control-label">Email</label>
            <input name="email" class="form-control" type="email" value="{{ old('email') }}" placeholder="Enter email format @example.com">
        </div>
        <div class="form-group">
            <label for="example-text-input" class="form-control-label">Phone</label>
            @error('phone')
                <span class="text-danger fst-italic fs-7">{{ $message }}</span>
            @enderror
            <input name="phone" class="form-control" type="text" value="{{ old('phone') }}" placeholder="Enter phone">
        </div>
        <div class="form-group">
            <label for="example-text-input" class="form-control-label">Fax</label>
            @error('fax')
                <span class="text-danger fst-italic fs-7">{{ $message }}</span>
            @enderror
            <input name="fax" class="form-control" type="text" value="{{ old('fax') }}" placeholder="Enter fax">
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
