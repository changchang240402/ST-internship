@extends('admin.layouts.main')

@section('pageName')
   <a href="#">Edit Supplier</a>
@endsection

@section('title')
   <a href="#">Edit Supplier</a>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card card-body">
            <form class="form-horizontal mt-4" method="POST" action="{{ route('suppliers.update', ['supplier' => $supplier['id']]) }}">
                @csrf
                @method('PUT')
                <input type="hidden" name="supplier_id" value="{{ $supplier['id'] }}">
                <div class="form-group">
                    <label for="company_name">Company Name</label>
                    <input type="text" class="form-control @error('company_name') is-invalid @enderror" name="company_name" value="{{ old('company_name', $supplier['company_name']) }}">
                    @error('company_name')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="transaction_name">Transaction Name</label>
                    <input type="text" class="form-control @error('transaction_name') is-invalid @enderror" name="transaction_name" value="{{ old('transaction_name', $supplier['transaction_name']) }}">
                    @error('transaction_name')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address', $supplier['address']) }}">
                    @error('address')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', $supplier['email']) }}">
                    @error('email')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone', $supplier['phone']) }}">
                    @error('phone')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="fax">Fax</label>
                    <input type="text" class="form-control @error('fax') is-invalid @enderror" name="fax" value="{{ old('fax', $supplier['fax']) }}">
                    @error('fax')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <button class="btn btn-success text-white" type="submit" >Update</button>
                    </div>
                </div>               
            </form>
        </div>
    </div>
</div>
@endsection
