@extends('default')

@section('content')

    <h4 class="py-3 mb-4"><span class="text-muted fw-light"><a
                href="{{ route('customers.index') }}">Customers</a> / </span>Details</h4>

    <div class="card mb-4">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="mb-0">Customer details</h5>
            <a href="{{ route('customers.index') }}"><i class='bx bx-arrow-back'></i></a>
        </div>
        <div class="card-body">
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">ID</label>
                <div class="col-sm-10">
                    <p>{{ $customer->id }}</p>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Company Name</label>
                <div class="col-sm-10">
                    <p>{{ $customer->company_name }}</p>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Transaction Name</label>
                <div class="col-sm-10">
                    <p>{{ $customer->transaction_name }}</p>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Address</label>
                <div class="col-sm-10">
                    <p>{{ $customer->address }}</p>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <p>{{ $customer->email }}</p>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Phone</label>
                <div class="col-sm-10">
                    <p>{{ $customer->phone }}</p>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Fax</label>
                <div class="col-sm-10">
                    <p>{{ $customer->fax }}</p>
                </div>
            </div>
        </div>
    </div>

@stop
