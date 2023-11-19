<?php

namespace App\Http\Controllers;

use App\Http\Requests\Categories\CreateCategoryRequest;
use App\Http\Requests\Categories\DeleteCategoryRequest;
use App\Http\Requests\Categories\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected const PAGINATE_DEFAULT = 15;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::paginate(self::PAGINATE_DEFAULT);
        return view('category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateCategoryRequest $request)
    {
        $category = new Category();
        if ($category->create($request->all())) {
            session()->flash('message', 'Create new category was successful!');
        } else {
            session()->flash('error', 'Create new category failed!');
        }

        return redirect()->route('categories.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::findOrFail($id);
        return view('category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, string $id)
    {
        $category = Category::findOrFail($id);
        if ($category->update($request->all())) {
            session()->flash('message', 'Update the category was successful!');
        } else {
            session()->flash('error', 'Update the category failed!');
        }

        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DeleteCategoryRequest $request, string $id)
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
