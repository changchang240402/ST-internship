@extends('home')
@section('title', 'Create Customer')
@section('pageName', 'Create Customer')
@section('content')
<div class="col-xl">
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Create New Customer</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('customers.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label" for="basic-icon-default-companyname">Company Name</label>
                    <div class="input-group input-group-merge">
                        <span id="basic-icon-default-companyname2" class="input-group-text">
                            <i class="bx bx-user"></i>
                        </span>
                        <input type="text" class="form-control" id="basic-icon-default-companyname"
                            name="company_name" value="{{ old('company_name') }}" placeholder="Công ty ABC"
                            aria-label="Công ty ABC" aria-describedby="basic-icon-default-companyname2" />
                        @error('company_name')
                            <div class="invalid-feedback" style="display: block">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="basic-icon-default-transactionname">Transaction Name</label>
                    <div class="input-group input-group-merge">
                        <span id="basic-icon-default-transactionname2" class="input-group-text">
                            <i class='bx bxs-barcode'></i>
                        </span>
                        <input type="text" id="basic-icon-default-transactionname" class="form-control"
                            name="transaction_name" value="{{ old('transaction_name') }}" placeholder="ACME Inc."
                            aria-label="ACME Inc." aria-describedby="basic-icon-default-transactionname2" />
                        @error('transaction_name')
                            <div class="invalid-feedback" style="display: block">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="basic-icon-default-address">Address</label>
                    <div class="input-group input-group-merge">
                        <span id="basic-icon-default-address2" class="input-group-text">
                            <i class="bx bx-buildings"></i>
                        </span>
                        <input type="text" id="basic-icon-default-address" class="form-control" name="address"
                            value="{{ old('address') }}" placeholder="ACME Inc." aria-label="ACME Inc."
                            aria-describedby="basic-icon-default-address2" />
                    </div>
                    @error('address')
                        <div class="invalid-feedback" style="display: block">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label" for="basic-icon-default-email">Email</label>
                    <div class="input-group input-group-merge">
                        <span class="input-group-text"><i class="bx bx-envelope"></i></span>
                        <input type="text" id="basic-icon-default-email" class="form-control" name="email"
                            value="{{ old('email') }}" placeholder="john.doe@gmail.com" aria-label="john.doe@gmail.com"
                            aria-describedby="basic-icon-default-email2" />
                    </div>
                    @error('email')
                        <div class="invalid-feedback" style="display: block">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label" for="basic-icon-default-phone">Phone</label>
                    <div class="input-group input-group-merge">
                        <span id="basic-icon-default-phone2" class="input-group-text">
                            <i class="bx bx-phone"></i>
                        </span>
                        <input type="text" id="basic-icon-default-phone" class="form-control phone-mask"
                            name="phone" value="{{ old('phone') }}" placeholder="0658 799 894"
                            aria-label="0658 799 894" aria-describedby="basic-icon-default-phone2" />
                    </div>
                    @error('phone')
                        <div class="invalid-feedback" style="display: block">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label" for="basic-icon-default-fax">Fax</label>
                    <div class="input-group input-group-merge">
                        <span id="basic-icon-default-fax2" class="input-group-text">
                            <i class='bx bxs-printer'></i>
                        </span>
                        <input id="basic-icon-default-fax" class="form-control" placeholder="6587 998 941"
                            name="fax" value="{{ old('fax') }}" aria-label="6587 998 941"
                            aria-describedby="basic-icon-default-fax2" />
                        @error('fax')
                            <div class="invalid-feedback" style="display: block">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <a href="{{ route('customers.index') }}" type="button"
                    class="btn rounded-pill btn-outline-warning">Cancel</a>
                <button type="submit" class="btn rounded-pill btn-outline-success">Save</button>
            </form>
        </div>
    </div>
</div>
@endsection
