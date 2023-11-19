<?php

namespace App\Http\Controllers;

use App\Http\Requests\Category\StoreCategoryRequest;
use App\Http\Requests\Category\UpdateCategoryRequest;
use App\Models\Category;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $perPage = 10;
        $categories = Category::paginate($perPage);
        return view('admin.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        try {
            // Create a new Category instance and fill its attributes
            Category::create($request->validated());
            session()->flash('success', 'Successfully added category!');
        } catch (Exception $e) {
            session()->flash('error', 'An error occurred while adding category!');
        }
        return redirect()
            ->route('categories.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        return view('admin.category.edit', ['category' => Category::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, int $id)
    {
        try {
            $category = Category::findOrFail($id);
            $category->category_name = $request->input('category_name');
            $category->save();
            session()->flash('success', 'Updated category information successfully!');
        } catch (Exception $e) {
            session()->flash('error', 'Updating category information failed, Please try again!');
        }
        return redirect()
            ->route('categories.index', $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        try {
            Category::findOrFail($id)->delete();
            session()->flash('success', 'Category has been deleted successfully!');
        } catch (ModelNotFoundException $e) {
            session()->flash('error', 'Failed to delete category. An error occurred. Please try again!');
        }
        return redirect()
            ->route('categories.index');
    }
}
