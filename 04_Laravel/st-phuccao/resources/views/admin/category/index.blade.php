@extends('admin.layouts.main')

@section('pageName')
   <a href="#">Categories</a>
@endsection

@section('title')
   <a href="#">Supplier</a>
@endsection

@section('content')
<div class="col-12">
    @include('admin.layouts.alerts')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">List Categories</h4>
        </div>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Category ID</th>
                        <th scope="col">Category Name</th>
                        <th scope="col">Created At</th>
                        <th scope="col">Updated At</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $item)
                        <tr>
                            <th scope="row">{{$loop->index}}</th>
                            <td>{{ $item['category_id'] }}</td>
                            <td>{{ $item['category_name'] }}</td>
                            <td>{{ $item['created_at'] }}</td>
                            <td>{{ $item['updated_at'] }}</td>
                            <td>
                                <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('categories.edit', ['category' => $item['id']]) }}"
                                    aria-expanded="false">
                                    <i class="mdi mdi-account-edit"></i>
                                    <span class="hide-menu">Edit</span>
                                </a>
                            </td>
                            <td>
                            <form action="{{ route('categories.destroy', $item->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this category?')">Delete</button>
                            </form>
                        </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="text-center">
                <button class="btn btn-success text-white" onclick="window.location.href='{{ $categories->previousPageUrl() }}'" @if (!$categories->onFirstPage()) style="display:inline-block" @else style="display:none" @endif>
                    Previous
                </button>
                <button class="btn btn-success text-white" onclick="window.location.href='{{ $categories->nextPageUrl() }}'" @if ($categories->hasMorePages()) style="display:inline-block" @else style="display:none" @endif>
                    Next
                </button>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                    <button class="btn btn-success text-white"><a href="{{ route('categories.create') }}">Add Category</a></button>
                </div>
            </div> 
        </div>
    </div>
</div>
@endsection
