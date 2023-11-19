@extends('admin.layouts.admin')
@section('content')
    <!-- partial -->
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        @if (session()->has('message'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <span class="alert-text"><strong>Success!</strong> {{ session()->get('message') }}</span>
                            </div>
                        @endif
                        @if (session()->has('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <span class="alert-text"><strong>Error!</strong> {{ session()->get('error') }}</span>
                            </div>
                        @endif
                        <div class="card-body" style="align-items: center">
                            <div class="row">
                                <div class="col-9">
                                    <h4 class="card-title">Categories Management</h4>
                                </div>
                                <div class="col-3">
                                    <a class="btn btn-success" href="{{ route('categories.create') }}"
                                        style="padding: 5px 30px">Add Category
                                    </a>
                                </div>
                            </div>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th> ID </th>
                                        <th> Company ID </th>
                                        <th> Category Name </th>
                                        <th> Action </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categories as $item)
                                        <tr>
                                            <td>{{ $item['id'] }}</td>
                                            <td>{{ $item['category_id'] }}</td>
                                            <td>{{ $item['category_name'] }}</td>
                                            <td>
                                                <div class="btn-group" role="group">
                                                    <a href="{{ route('categories.edit', ['category' => $item['id']]) }}"
                                                        class="btn btn-warning mr-2" style="padding: 0.25rem 0.5rem">
                                                        <i class="fa-solid fa-pen"></i>
                                                    </a>
                                                    <form method="POST"
                                                        action="{{ route('categories.destroy', ['category' => $item['id']]) }}"
                                                        onsubmit="return confirm('Are you sure you want to delete')">
                                                        @method('DELETE')
                                                        @csrf
                                                        <input style="display: none" name="id"
                                                            value="{{ $item['id'] }}">
                                                        <button type="submit" class="btn btn-danger"
                                                            style="padding: 0.25rem 0.5rem">
                                                            <i class="fa-solid fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </div>
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
@stop

@section('scripts')
    <script src="{{ asset('admin/assets/vendors/js/vendor.bundle.base.js') }} "></script>
    <script src="{{ asset('admin/assets/vendors/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/jquery.cookie.js') }}"></script>
    <script src="{{ asset('admin/assets/js/off-canvas.js') }}"></script>
    <script src="{{ asset('admin/assets/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('admin/assets/js/misc.js') }}"></script>
    <script src="{{ asset('admin/assets/js/dashboard.js') }}"></script>
    <script src="{{ asset('admin/assets/js/todolist.js') }}"></script>
@stop
