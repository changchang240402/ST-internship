<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest\DeleteCategoryRequest;
use App\Http\Requests\CategoryRequest\StoreCategoryRequest;
use App\Http\Requests\CategoryRequest\UpdateCategoryRequest;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();

        return view('sections.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('sections.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        $category = Category::withTrashed()
            ->where('category_id', $request->input('category_id'))
            ->first();
        if ($category && $category->trashed()) {
            $category->restore();
            session()->flash('status', 'Đã khôi phục dữ liệu thành công');
        } elseif (Category::create($request->validated())) {
            session()->flash('status', 'Đã thêm dữ liệu thành công');
        }

        return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category = Category::find($id);

        return view('sections.category.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::find($id);

        return view('sections.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, string $id)
    {
        $category = Category::find($id);
        $isUpdated = $category->update($request->validated());
        if ($isUpdated) {
            session()->flash('status', 'Đã sửa dữ liệu thành công');
        }

        return redirect()->route('categories.index', $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DeleteCategoryRequest $request, string $id)
    {
        $category = Category::find($id);
        $isDeleted = $category->delete();
        if ($isDeleted) {
            session()->flash('status', 'Đã xóa dữ liệu thành công');
        }

        return redirect()->route('categories.index');
    }
}
