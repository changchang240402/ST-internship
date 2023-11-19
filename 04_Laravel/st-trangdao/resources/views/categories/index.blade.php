@extends('home')
@section('title', 'List Categories')
@section('pageName', 'List Categories')
@section('content')
<div class="card">
    <h5 class="card-header">List Categories</h5>
    <div class="col-12 text-end">
        <a class="btn bg-gradient-dark mb-0" href="{{ route('categories.create') }}"><i
                class="btn rounded-pill btn-outline-info">&nbsp;&nbsp;Add New</i></a>
    </div>
    <div class="table-responsive text-nowrap">
        <table class="table">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Category ID</th>
                    <th>Category Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach ($categories as $key => $category)
                    <tr>
                        <td class="fab fa-angular fa-lg text-danger me-3">{{ $key + 1 }}</td>
                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <a
                                href="{{ route('categories.show', ['category' => $category['id']]) }}">{{ $category['category_id'] }}</a>
                        </td>
                        <td><span class="badge bg-label-primary me-1">{{ $category['category_name'] }}</span></td>
                        <td>
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                    data-bs-toggle="dropdown">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item"
                                        href="{{ route('categories.edit', ['category' => $category['id']]) }}">
                                        <i class="bx bx-edit-alt me-1"></i> Edit</a>
                                    <a class="dropdown-item" data-bs-toggle="modal"
                                        data-bs-target="#modalCenter{{ $category['id'] }}">
                                        <i class="bx bx-trash me-1"></i> Delete</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <div class="mt-3">
                        <!-- Modal -->
                        <div class="modal fade" id="modalCenter{{ $category['id'] }}" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel1">Delete database
                                        </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <span id="basic-icon-default-categoryid2"
                                            class="fab fa-angular fa-lg text-danger me-1">
                                            Bạn chắc chắn sẽ xóa dữ liệu này chứ
                                        </span>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-outline-secondary"
                                            data-bs-dismiss="modal">
                                            Close
                                        </button>
                                        <form
                                            action="{{ route('categories.destroy', ['category' => $category['id']]) }}"
                                            method="post">
                                            @csrf
                                            @method('DELETE')
                                            <input type="hidden" name="id" value="{{ $category['id'] }}">
                                            @error('id')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
