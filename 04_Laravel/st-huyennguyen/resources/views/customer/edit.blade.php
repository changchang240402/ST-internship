@extends('layout.app')
@section('title', 'Edit Customer')
@section('PageName', 'Edit Customer')
@section('content')
    <div class="card-header pb-0">
        <h6>Edit Customer</h6>
    </div>
    <form action="{{ route('customers.update', ['customer' => $customer['id']]) }}" method="POST">
        @method('PUT')
        @csrf
        <input type="hidden" name="id" value="{{ $customer['id'] }}">
        <div class="form-group">
            <label for="example-text-input" class="form-control-label">Company Name</label>
            @error('company_name')
                <span class="text-danger fst-italic fs-7">{{ $message }}</span>
            @enderror
            <input name="company_name" class="form-control" type="text" value="{{ old('company_id', $customer['company_name']) }}">
        </div>
        <div class="form-group">
            <label for="example-search-input" class="form-control-label">Transaction Name</label>
            @error('transaction_name')
                <span class="text-danger fst-italic fs-7">{{ $message }}</span>
            @enderror
            <input name="transaction_name" class="form-control" type="text" value="{{ old('transaction_name', $customer['transaction_name']) }}">
        </div>
        <div class="form-group">
            <label for="example-text-input" class="form-control-label">Address</label>
            @error('address')
                <span class="text-danger fst-italic fs-7">{{ $message }}</span>
            @enderror
            <input name="address" class="form-control" type="text" value="{{ old('address', $customer['address']) }}">
        </div>
        <div class="form-group">
            <label for="example-email-input" class="form-control-label">Email</label>
            @error('email')
                <span class="text-danger fst-italic fs-7">{{ $message }}</span>
            @enderror
            <input name="email" class="form-control" type="email" value="{{ old('email', $customer['email']) }}">
        </div>
        <div class="form-group">
            <label for="example-text-input" class="form-control-label">Phone</label>
            @error('phone')
                <span class="text-danger fst-italic fs-7">{{ $message }}</span>
            @enderror
            <input name="phone" class="form-control" type="text" value="{{ old('phone', $customer['phone']) }}">
        </div>
        <div class="form-group">
            <label for="example-text-input" class="form-control-label">Fax</label>
            @error('fax')
                <span class="text-danger fst-italic fs-7">{{ $message }}</span>
            @enderror
            <input name="fax" class="form-control" type="text" value="{{ old('fax', $customer['fax']) }}">
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
