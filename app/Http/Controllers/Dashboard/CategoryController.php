<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Interfaces\Dashboard\CategoryServiceInterface;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;


class CategoryController extends Controller
{
    protected $category;
    protected $categoryService;
    public function __construct(Category $category,CategoryServiceInterface $categoryService)
    {
        $this->category=$category;
        $this->categoryService=$categoryService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Gate::authorize('categories.view');
        $categories=$this->categoryService->indexCategory();
        return view('admin.category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Gate::authorize('categories.create');
        $categories=$this->category->all();
        return view('admin.category.create',compact('categories'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        Gate::authorize('categories.create');
        $this->categoryService->categoryStore($request);
        return redirect()->route('categories')
                ->with('success','Category Created');
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
    public function edit(string $id)
    {
        Gate::authorize('categories.update');
        $category=Category::findOrFail($id);
        return view('admin.category.edit',compact('category'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, string $id)
    {
        Gate::authorize('categories.update');
        $this->categoryService->categoryUpdate($id,$request);
        return redirect()->route('categories')
            ->with('success','Category Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Gate::authorize('categories.delete');
        $this->categoryService->categoryDelete($id);
        return Redirect::route('categories')
            ->with('success','Category Deleted');
    }
}
