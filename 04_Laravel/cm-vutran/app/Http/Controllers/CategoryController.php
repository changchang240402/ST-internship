<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest\CreateCategoryRequest;
use App\Http\Requests\CategoryRequest\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $categories = Category::get();

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
        $validatedData = $request->validated();

        $existingCategory = Category::onlyTrashed()
        ->where('category_id', $validatedData['category_id'])
        ->first();
        
        if ($existingCategory) {
            $existingCategory->restore();
            $request->session()->flash('success', 'You have input duplicate category_id, restore Category successful!');
        } else{
            $category = new Category();
            $category->create($validatedData);
            $request->session()->flash('success', 'Add Category successful!');
        }

        return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $Id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::find($id);

        if (!$category) {
            abort(404);
        }
        
        return view('category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, string $id)
    {
        $category = Category::find($id);

        if (!$category) {
            abort(404);
        }

        $validatedData = $request->validated();

        if ($category->update($validatedData)) {
            $request->session()->flash('success', 'Update Category Successful!');
        } else {
            $request->session()->flash('danger', 'Update Category Error!');
        }

        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        $category = Category::find($id);

        if (!$category) {
            abort(404);
        }

        if ($category->delete()) {
            $request->session()->flash('success', 'Delete Category Successful!');
        } else {
            $request->session()->flash('danger', 'Delete Category Error!');
        }

        return redirect()->route('categories.index');
    }
}
