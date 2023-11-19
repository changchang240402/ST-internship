@extends('admin.layouts.layout1')
@section('modal')
<div class="modal fade" id="add-category-modal" tabindex="-1" aria-labelledby="add-category-modal" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="add-category-modal">Thêm danh mục sản phẩm</h1>
        </div>
        <div class="modal-body">
            @if ($errors->any())
            @section('modalTrigger')document.querySelector('[data-bs-target="#add-category-modal"]').click();@endsection
            @endif
            <form id="addCategoryForm" method="post" action="{{ route('categories.store') }}">
                @csrf
                <label>ID danh mục</label>
                <input class="form-control @error('category_id') is-invalid @enderror" placeholder="ID danh mục" name="category_id"/>
                @error('category_id')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
                <label>Tên danh mục</label>
                <input class="form-control @error('category_name') is-invalid @enderror" placeholder="Tên danh mục" name="category_name"/>
                @error('category_name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button class="btn btn-primary" type="submit" form="addCategoryForm">Thêm danh mục</button>
        </div>
      </div>
    </div>
</div>

<div class="modal fade" id="deleteCategoryModal" tabindex="-1" aria-labelledby="deleteCategoryModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="deleteCategoryModalLabel">Bạn có chắc là muốn xóa</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="alert alert-info" role="alert">
                    Hành động này không thể hoàn tác !!!
                </div>
                <form method="post" id="deleteCategoryForm">
                    @csrf
                    @method("DELETE")
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                <button type="submit" form="deleteCategoryForm" class="btn btn-danger">Vẫn xóa</button>
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
                    <h6>Danh mục sản phẩm</h6>
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add-category-modal">Thêm danh mục sản phẩm</button>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        STT</th>
                                    <th
                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        ID danh mục</th>
                                    <th
                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Tên danh mục</th>
                                    <th
                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Hành động</th>    
                                    <th class="text-secondary opacity-7"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $index => $category)
                                <tr>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0 text-center">{{ $index + 1 }}</p>
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">{{ $category->category_id }}</p>
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">{{ $category->category_name }}</p>
                                    </td>
                                    <td class="align-middle">
                                        <a href="{{ route('categories.edit', ['category'=>$category->id]) }}" class="btn btn-success">Edit</a>
                                        <button class="btn btn-danger" onclick="(function() {
                                            var deleteCategoryModal = new bootstrap.Modal(document.getElementById('deleteCategoryModal'), {});
                                            deleteCategoryModal.show();
                                            document.getElementById('deleteCategoryForm').action = '{{ route('categories.destroy' , ['category' => $category->category_id]) }}';
                                        })();">Xóa</button>
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
