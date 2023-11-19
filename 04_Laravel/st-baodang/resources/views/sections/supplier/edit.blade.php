@extends('default')

@section('content')

    <h4 class="py-3 mb-4"><span class="text-muted fw-light"><a href="{{ route('suppliers.index') }}">Suppliers</a> / {{ $supplier->id }} / </span>Edit
    </h4>

    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Editing supplier</h5>
            <a href="{{ route('suppliers.index') }}"><i class='bx bx-arrow-back'></i></a>
        </div>
        <div class="card-body">
            <form method="POST" action="{{route('suppliers.update', $supplier->id)}}">
                @csrf
                @method('PUT')
                <input style="display: none" name="id" value="{{ $supplier->id }}">
                @error('id')
                <div class="invalid-feedback" style="display: block">
                    {{ $message }}
                </div>
                @enderror
                <div class="mb-3">
                    <label class="form-label" for="company_id">Company ID</label>
                    <input value="{{ old('company_id', $supplier->company_id) }}" name="company_id" type="text"
                           class="form-control"
                           id="company_id"
                           placeholder="STE"/>
                    @error('company_id')
                    <div class="invalid-feedback" style="display: block">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label" for="company_name">Company Name</label>
                    <input value="{{ old('company_name', $supplier->company_name) }}" name="company_name" type="text"
                           class="form-control"
                           id="company_name"
                           placeholder="Công ty SupremeTech"/>
                    @error('company_name')
                    <div class="invalid-feedback" style="display: block">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label" for="transaction_name">Transaction Name</label>
                    <input value="{{ old('transaction_name', $supplier->transaction_name) }}" name="transaction_name"
                           type="text"
                           class="form-control" id="transaction_name"
                           placeholder="STECH"/>
                    @error('transaction_name')
                    <div class="invalid-feedback" style="display: block">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label" for="address">Message</label>
                    <textarea
                        name="address"
                        style="resize: none"
                        id="address"
                        class="form-control"
                        placeholder="363 Nguyễn Hữu Thọ, Khuê Trung, Cẩm Lệ, Đà Nẵng">{{ old('address', $supplier->address) }}</textarea>
                    @error('address')
                    <div class="invalid-feedback" style="display: block">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label" for="email">Email</label>
                    <div class="input-group input-group-merge">
                        <input
                            value="{{ old('email', $supplier->email) }}"
                            name="email"
                            type="text"
                            id="email"
                            class="form-control"
                            placeholder="hr@supremetech.vn"/>
                        @error('email')
                        <div class="invalid-feedback" style="display: block">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="phone">Phone No</label>
                    <input
                        value="{{ old('phone', $supplier->phone) }}"
                        name="phone"
                        type="text"
                        id="phone"
                        class="form-control phone-mask"
                        placeholder="0236 3626 989"/>
                    @error('phone')
                    <div class="invalid-feedback" style="display: block">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label" for="fax">Fax</label>
                    <input
                        value="{{ old('fax', $supplier->fax) }}"
                        name="fax"
                        type="text"
                        class="form-control phone-mask"
                        id="fax"
                        placeholder="0236 3626 989"/>
                    @error('fax')
                    <div class="invalid-feedback" style="display: block">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <a href="{{ route('suppliers.show', $supplier->id) }}" class="btn btn-secondary" type="button">Cancel</a>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@stop
