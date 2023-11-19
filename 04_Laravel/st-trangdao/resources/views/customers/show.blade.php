@extends('home')
@section('title', 'Show Details Customer')
@section('pageName', 'Show Details Customer')
@section('content')
<div class="col-xl">
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Profile Details Customer</h5>
        </div>
        <div class="card-body">
            <form href="{{ route('customers.show', ['customer' => $customer['id']]) }} ">
                <div class="mb-3">
                    <label for="html5-text-input" class="col-md-2 col-form-label">ID : </label>
                    <div class="col-md-10">
                        <span id="basic-icon-default-companyname2" class="input-group-text">
                            <i class='bx bx-id-card'></i>
                            {{ $customer['id'] }}
                        </span>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="html5-text-input" class="col-md-2 col-form-label">Company Name : </label>
                    <div class="col-md-10">
                        <span id="basic-icon-default-companyname2" class="input-group-text">
                            <i class="bx bx-user"></i>
                            {{ $customer['company_name'] }}
                        </span>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="html5-text-input" class="col-md-2 col-form-label">Transaction Name : </label>
                    <div class="col-md-10">
                        <span id="basic-icon-default-transactionname2" class="input-group-text">
                            <i class='bx bxs-barcode'></i>
                            {{ $customer['transaction_name'] }}
                        </span>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="html5-text-input" class="col-md-2 col-form-label">Address : </label>
                    <div class="col-md-10">
                        <span id="basic-icon-default-address2" class="input-group-text">
                            <i class="bx bx-buildings"></i>
                            {{ $customer['address'] }}
                        </span>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="html5-text-input" class="col-md-2 col-form-label">Email : </label>
                    <div class="col-md-10">
                        <span class="input-group-text">
                            <i class="bx bx-envelope"></i>
                            {{ $customer['email'] }}
                        </span>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="html5-text-input" class="col-md-2 col-form-label">Phone : </label>
                    <div class="col-md-10">
                        <span id="basic-icon-default-phone2" class="input-group-text">
                            <i class="bx bx-phone"></i>
                            {{ $customer['phone'] }}
                        </span>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="html5-text-input" class="col-md-2 col-form-label">Fax : </label>
                    <div class="col-md-10">
                        <span id="basic-icon-default-fax2" class="input-group-text">
                            <i class='bx bxs-printer'></i>
                            {{ $customer['fax'] }}
                        </span>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
