<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\FoodRequest;
use App\Models\Food;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class FoodController extends Controller
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
        return Food::filter($request->query())->with('category')->paginate();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FoodRequest $request)
    {
        Gate::authorize('foods.create');
        return Food::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(Food $food)
    {
        return $food;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FoodRequest $request, string $id)
    {
        Gate::authorize('foods.update');
        $food=Food::find($id);
        $food->update($request->all());
        return [
            'message'=>'Food Updated Successfully'
        ];
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Gate::authorize('foods.delete');
        Food::destroy($id);
        return [
            'message'=>'Food Deleted Successfully'
        ];
    }
}
