<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum')->except(['index','show']);
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return Category::filter($request->query())->paginate();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        Gate::authorize('admins.create');
        return Category::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return $category;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, string $id)
    {
        Gate::authorize('categories.update');
        $category=Category::find($id);
        $category->update($request->all());
        return [
            'message'=>'Category Updated Successfully'
        ];
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Gate::authorize('categories.delete');
        Category::destroy($id);
        return [
            'message'=>'Category Deleted Successfully'
        ];
    }
}
