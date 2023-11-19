<?php

namespace App\Http\Controllers;

use App\Http\Requests\Category\DeleteCategoryRequest;
use App\Http\Requests\Category\StoreCategoryRequest;
use App\Http\Requests\Category\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::paginate(5);

        return view('admin.category.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(StoreCategoryRequest $request)
    {
        $category = new Category();

        if ($category->create($request->validated())) {
            session()->flash('message', 'Create new category was successful!');
        } else {
            session()->flash('error', 'Create new category failed!');
        }

        return redirect()->route('categories.index')
            ->with('success', 'category created successfully.');
    }

    public function show(string $id)
    {
    }

    public function edit(int $id)
    {
        $category = Category::findOrFail($id);

        return view('admin.category.edit', compact('category'));
    }

    public function update(UpdateCategoryRequest $request, int $id)
    {
        $category = Category::findOrFail($id);

        if ($category->update($request->validated())) {
            session()->flash('message', 'Update the category was successful!');
        } else {
            session()->flash('error', 'Update the category failed!');
        }

        return redirect()->route('categories.index');
    }

    public function destroy(DeleteCategoryRequest $request, int $id)
    {
        $category = Category::findOrFail($id);

        if ($category->delete()) {
            session()->flash('message', 'Delete the category was successful!');
        } else {
            session()->flash('error', 'Delete the category failed!');
        }

        return redirect()->route('categories.index');
    }
}
