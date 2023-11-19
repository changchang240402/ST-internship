@extends('default')

@section('content')
    @error('id')
    <div class="alert alert-danger alert-dismissible" role="alert">
        {{ $message }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @enderror
    @if(Session::has('status'))
        <div class="alert alert-success alert-dismissible" role="alert">
            {{ Session::get('status') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <h4 class="py-3 mb-4"><span class="text-muted fw-light">Tables /</span> Customers</h4>

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Customers table</h5>
            <a href="{{ route('customers.create') }}" type="button" class="btn btn-primary">Create</a>
        </div>
        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead class="table-light">
                <tr>
                    <th>#</th>
                    <th>Company Name</th>
                    <th>Transaction Name</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                @foreach($customers as $customer)
                    <tr>
                        <td><span class="fw-medium">{{$customer->id}}</span></td>
                        <td><a href="{{ route('customers.show', $customer->id) }}">{{ $customer->company_name }}</a></td>
                        <td>{{ $customer->transaction_name }}</td>
                        <td>{{ $customer->email }}</td>
                        <td>
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu" style="">
                                    <a class="dropdown-item" href="{{ route('customers.edit', $customer->id) }}"><i
                                            class="bx bx-edit-alt me-1"></i> Edit</a>
                                    <a class="dropdown-item" data-bs-toggle="modal"
                                       data-bs-target="#modalCenter{{$customer->id}}"><i
                                            class="bx bx-trash me-1"></i> Delete</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <div class="mt-3">
                        <!-- Modal -->
                        <div class="modal fade" id="modalCenter{{$customer->id}}" tabindex="-1" aria-hidden="true"
                             style="display: none;">
                            <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalCenterTitle">Are you sure?</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                    </div>
                                    <form method="POST" action="{{ route('customers.destroy', $customer->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <input style="display: none" name="id" value="{{ $customer->id }}">
                                        <div class="modal-body mx-auto">
                                            <button type="button" class="btn btn-outline-secondary"
                                                    data-bs-dismiss="modal">
                                                Cancel
                                            </button>
                                            <button type="submit" class="btn btn-primary">Yes</button>

                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

                </tbody>
            </table>
        </div>
    </div>

@stop
