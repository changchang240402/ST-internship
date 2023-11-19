@extends('default')

@section('content')

    <h4 class="py-3 mb-4"><span class="text-muted fw-light"><a
                href="{{ route('suppliers.index') }}">Suppliers</a> / </span>Details</h4>

    <div class="card mb-4">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="mb-0">Supplier details</h5>
            <a href="{{ route('suppliers.index') }}"><i class='bx bx-arrow-back'></i></a>
        </div>
        <div class="card-body">
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">ID</label>
                <div class="col-sm-10">
                    <p>{{ $supplier->id }}</p>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Company ID</label>
                <div class="col-sm-10">
                    <p>{{ $supplier->company_id }}</p>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Company Name</label>
                <div class="col-sm-10">
                    <p>{{ $supplier->company_name }}</p>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Transaction Name</label>
                <div class="col-sm-10">
                    <p>{{ $supplier->transaction_name }}</p>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Address</label>
                <div class="col-sm-10">
                    <p>{{ $supplier->address }}</p>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <p>{{ $supplier->email }}</p>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Phone</label>
                <div class="col-sm-10">
                    <p>{{ $supplier->phone }}</p>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Fax</label>
                <div class="col-sm-10">
                    <p>{{ $supplier->fax }}</p>
                </div>
            </div>
        </div>
    </div>
@stop
