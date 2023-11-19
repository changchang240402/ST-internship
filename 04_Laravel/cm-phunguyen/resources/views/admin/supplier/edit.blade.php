@extends('layouts.auth')

@section('content')
    <div id="wrapper">
        <!-- Begin Page Content -->
        <div class="container-fluid">
            <h1 class="h3 mb-2 text-gray-800">Edit Function</h1>
            <div class="p-5">
                <form class="user" method="POST" action="{{ route('suppliers.update', ['supplier' => $supplier['id']]) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <h6>Company Id</h6>
                        <input type="text" name="company_id" class="form-control form-control-user"
                            placeholder="Company Id" value="{{ old('company_id', $supplier['company_id']) }}">
                        @error('company_id')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <h6>Company Name</h6>
                        <input type="text" name="company_name" class="form-control form-control-user"
                            placeholder="Company Name" value="{{ old('company_name', $supplier['company_name']) }}">
                        @error('company_name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <h6>Transaction Name</h6>
                        <input type="text" name="transaction_name" class="form-control form-control-user"
                            placeholder="Transaction Name"
                            value="{{ old('transaction_name', $supplier['transaction_name']) }}">
                        @error('transaction_name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <h6>Address</h6>
                        <input type="text" name="address" class="form-control form-control-user" placeholder="Address"
                            value="{{ old('address', $supplier['address']) }}">
                        @error('address')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <h6>Phone</h6>
                        <input type="text" name="phone" class="form-control form-control-user" placeholder="Phone"
                            value="{{ old('phone', $supplier['phone']) }}">
                        @error('phone')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <h6>Fax</h6>
                        <input type="text" name="fax" class="form-control form-control-user" placeholder="Fax"
                            value="{{ old('fax', $supplier['fax']) }}">
                        @error('fax')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <h6>Email</h6>
                        <input type="text" name="email" class="form-control form-control-user" placeholder="Email"
                            value="{{ old('email', $supplier['email']) }}">
                        @error('email')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="button-container">
                        <button type="submit" class="btn btn-primary">
                            Update
                        </button>
                        <button type="button" class="btn btn-secondary"
                            onclick="window.location.href = '{{ route('suppliers.index') }}';">
                            Cancel
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>

    </html>
@endsection
