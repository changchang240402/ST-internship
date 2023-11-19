@extends('default')

@section('content')

    <h4 class="py-3 mb-4"><span class="text-muted fw-light"><a href="{{ route('categories.index') }}">Categories</a>/ {{$category->id}} / </span>Edit
    </h4>

    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Editing category</h5>
            <a href="{{ route('categories.index') }}"><i class='bx bx-arrow-back'></i></a>
        </div>
        <div class="card-body">
            <form method="POST" action="{{route('categories.update', $category->id)}}">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="cur_id" class="form-label"># {{ $category->id }}</label>
                    <input style="display: none" name="id" value="{{ $category->id }}">
                </div>
                <div class="mb-3">
                    <label class="form-label" for="category_id">Category ID</label>
                    <input value="{{ old('category_id', $category->category_id) }}" name="category_id" type="text"
                           class="form-control"
                           id="category_id"
                           placeholder="MP"/>
                    @error('category_id')
                    <div class="invalid-feedback" style="display:block;">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label" for="category_name">Category Name</label>
                    <input value="{{ old('category_name', $category->category_name) }}" name="category_name" type="text"
                           class="form-control"
                           id="category_name"
                           placeholder="Mỹ phẩm"/>
                    @error('category_name')
                    <div class="invalid-feedback" style="display:block;">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <a href="{{ route('categories.show', $category->id) }}" class="btn btn-secondary" type="button">Cancel</a>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

@stop
