@extends('layout.app')
@section('title', 'List Categories')
@section('PageName', 'List Categories')
@section('Modal', 'Category')
@section('content')
    @if (session()->has('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <span class="alert-icon"><i class="ni ni-like-2"></i></span>
            <span class="alert-text"><strong>Success!</strong> {{ session()->get('message') }}</span>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    @if (session()->has('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <span class="alert-icon"><i class="ni ni-notification-70"></i></span>
            <span class="alert-text"><strong>Error!</strong> {{ session()->get('error') }}</span>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>List Categories</h6>
                    <div class="col-12 text-end">
                        <a class="btn bg-gradient-dark mb-0" href="{{ route('categories.create') }}"><i
                                class="fas fa-plus"></i>&nbsp;&nbsp;Add New</a>
                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        No.</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Category ID</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Category Name</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Edit</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $key => $category)
                                    <tr>
                                        <td class="text-center">{{ $key + 1 }}</td>
                                        <td class="text-center">
                                            <h6 class="mb-0 text-sm">{{ $category['category_id'] }}</h6>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <p class="text-xs font-weight-bold mb-0">{{ $category['category_name'] }}</p>
                                        </td>
                                        <td class="align-middle text-center">
                                            <a href="{{ route('categories.edit', ['category' => $category['id']]) }}"
                                                type="button" class="btn bg-gradient-info">
                                                <i class="fas fa-pencil-alt ms-auto cursor-pointer"></i>
                                            </a>
                                        </td>
                                        <td class="text-center">
                                            <form id="destroy{{ $category['id'] }}"
                                                action="{{ route('categories.destroy', ['category' => $category['id']]) }}"
                                                method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $category['id'] }}">
                                                <button type="button" class="btn bg-gradient-danger btn-block mb-3"
                                                    onclick="destroyCategory({{ $category['id'] }})">
                                                    <i class="far fa-trash-alt ms-auto"></i>
                                                </button>
                                            </form>
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
    {!! $categories->links('pagination::bootstrap-4') !!}
@endsection
