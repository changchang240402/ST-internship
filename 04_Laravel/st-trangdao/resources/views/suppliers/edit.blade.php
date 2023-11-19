@extends('home')
@section('title', 'Edit Supplier')
@section('pageName', 'Edit Supplier')
@section('content')
<div class="col-xl">
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="card-header">Edit Supplier</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('suppliers.update', ['supplier' => $supplier['id']]) }}" method="POST">
                @method('PUT')
                @csrf
                <div class="mb-3 row">
                    <label for="html5-text-input" class="col-md-2 col-form-label">ID</label>
                    <div class="col-md-10">
                        <span id="basic-icon-default-supplierid2" class="fab fa-angular fa-lg text-danger me-3">
                            {{ $supplier['id'] }}
                        </span>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="html5-text-input" class="col-md-2 col-form-label">Company ID</label>
                    <div class="col-md-10">
                        <input class="form-control" type="text" name="company_id"
                            value="{{ old('company_id', $supplier['company_id']) }}" id="html5-text-input" />
                        @error('company_id')
                            <div class="invalid-feedback" style="display: block">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="html5-text-input" class="col-md-2 col-form-label">Company Name</label>
                    <div class="col-md-10">
                        <input class="form-control" type="text" name="company_name"
                            value="{{ old('company_name', $supplier['company_name']) }}" id="html5-text-input" />
                        @error('company_name')
                            <div class="invalid-feedback" style="display: block">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="html5-search-input" class="col-md-2 col-form-label">Transaction Name</label>
                    <div class="col-md-10">
                        <input class="form-control" type="text" name="transaction_name"
                            value="{{ old('transaction_name', $supplier['transaction_name']) }}"
                            id="html5-search-input" />
                        @error('transaction_name')
                            <div class="invalid-feedback" style="display: block">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="html5-search-input" class="col-md-2 col-form-label">Address</label>
                    <div class="col-md-10">
                        <input class="form-control" type="text" name="address"
                            value="{{ old('address', $supplier['address']) }}" id="html5-search-input" />
                        @error('address')
                            <div class="invalid-feedback" style="display: block">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="html5-search-input" class="col-md-2 col-form-label">Email</label>
                    <div class="col-md-10">
                        @error('email')
                            <div class="invalid-feedback" style="display: block">
                                {{ $message }}
                            </div>
                        @enderror
                        <input class="form-control" type="text" name="email"
                            value="{{ old('email', $supplier['email']) }}" id="html5-search-input" />
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="html5-search-input" class="col-md-2 col-form-label">Phone</label>
                    <div class="col-md-10">
                        <input class="form-control" type="text" name="phone"
                            value="{{ old('phone', $supplier['phone']) }}" id="html5-search-input" />
                        @error('phone')
                            <div class="invalid-feedback" style="display: block">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="html5-search-input" class="col-md-2 col-form-label">Fax</label>
                    <div class="col-md-10">
                        <input class="form-control" type="text" name="fax"
                            value="{{ old('fax', $supplier['fax']) }}" id="html5-search-input" />
                        @error('fax')
                            <div class="invalid-feedback" style="display: block">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <a href="" type="submit" class="btn rounded-pill btn-outline-warning">Cancel</a>
                <input type="hidden" name="id" value="{{ $supplier['id'] }}">
                <button type="submit" class="btn rounded-pill btn-outline-success">Edit</button>
            </form>
        </div>
    </div>
</div>
@endsection
