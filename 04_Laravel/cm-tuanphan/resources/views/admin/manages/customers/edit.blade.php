@extends('admin.layouts.layout1')

@section('modal')
<div class="modal fade" id="add-customer-modal" tabindex="-1" aria-labelledby="add-customer-modal" aria-hidden="true" data-bs-backdrop="static">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="add-customer-modal">Edit khách hàng</h1>
        </div>
        <div class="modal-body">
            @if ($errors->any() || Route::is('customers.edit'))
            @section('modalTrigger')document.querySelector('[data-bs-target="#add-customer-modal"]').click();@endsection
            @endif
            <form method="post" action="{{ route('customers.update' , ['customer' => $editingCustomer->id ]) }}" id="addCustomerForm">
                @csrf
                @method("PUT")
                <label>Tên công ty</label>
                <input class="form-control @error('company_name') is-invalid @enderror" value="{{ old('company_name') ? old('company_name') : $editingCustomer->company_name }}" placeholder="Tên công ty" name="company_name"/>
                @error('company_name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
                <label>Tên giao dịch</label>
                <input class="form-control @error('transaction_name') is-invalid @enderror" value="{{ old('transaction_name') ? old('transaction_name') : $editingCustomer->transaction_name }}" placeholder="Tên giao dịch" name="transaction_name"/>
                @error('transaction_name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
                <label>Địa chỉ</label>
                <input class="form-control @error('address') is-invalid @enderror" value="{{ old('address') ? old('address') : $editingCustomer->address }}" placeholder="Địa chỉ" name="address"/>
                @error('address')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
                <label>Số điện thoại</label>
                <input class="form-control @error('phone_number') is-invalid @enderror" value="{{ old('phone_number') ? old('phone_number') : $editingCustomer->phone_number }}" placeholder="Số điện thoại" name="phone_number"/>
                @error('phone_number')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
                <label>Số fax</label>
                <input class="form-control @error('fax') is-invalid @enderror" value="{{ old('fax') ? old('fax') : $editingCustomer->fax }}" placeholder="Số fax" name="fax"/>
                @error('fax')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </form>
        </div>
        <div class="modal-footer">
            <a href="{{ route('customers.index') }}"><button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button></a>
            <button type="submit" class="btn btn-primary" form="addCustomerForm">Edit khách hàng</button>
        </div>
      </div>
    </div>
</div>
@endsection

@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Danh sách khách hàng</h6>
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add-customer-modal">Thêm khách hàng</button>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        STT
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Tên công ty
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Tên giao dịch
                                    </th>
                                    <th
                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Địa chỉ</th>
                                    <th
                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Số điện thoại</th>
                                    <th
                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Số fax</th>

                                    <th
                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Hành động</th>


                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"></th>
                                </tr>
                            </thead>
                            <tbody> 
                                @foreach ($customers as $index => $customer)
                                <tr>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0 text-center">{{ $index + 1 }}</p>
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">{{ $customer->company_name }}</p>
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">{{ $customer->transaction_name }}</p>
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">{{ $customer->address }}</p>
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">{{ $customer->phone_number }}</p>
                                    </td>
                                    <td>
                                        <span class="text-xs font-weight-bold">{{ $customer->fax }}</span>
                                    </td>
                                    <td class="align-middle">
                                        <button class="btn btn-success">Edit</button>
                                        <button class="btn btn-danger">Xóa</button>
                                    </td>
                                </tr>                                    
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
