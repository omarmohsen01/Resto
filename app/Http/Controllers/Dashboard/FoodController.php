<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Interfaces\Dashboard\FoodServiceInterface;
use App\Http\Requests\FoodRequest;
use App\Models\Food;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Str;


class FoodController extends Controller
{
    protected $food;
    protected $foodService;
    public function __construct(FoodServiceInterface $foodService,Food $food)
    {
        $this->foodService=$foodService;
        $this->food=$food;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Gate::authorize('foods.view');
        $foods=$this->foodService->indexFood();
        return view('admin.food.index',compact('foods'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Gate::authorize('foods.create');
        $foods=Food::with('category')->get();
        return view('admin.food.create',compact('foods'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FoodRequest $request)
    {
        Gate::authorize('foods.create');
        $this->foodService->foodStore($request);
        return redirect()->route('foods')->
            with('success','Food Created');
    }

    /**
     * Display the specified resource.
     */
    public function show(Food $food)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        Gate::authorize('foods.update');
        $food=$this->food->findOrFail($id);
        return view('admin.food.edit',compact('food'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FoodRequest $request, string $id)
    {
        Gate::authorize('foods.update'); 
       $this->foodService->foodUpdate($id,$request);
        return redirect()->route('foods')
            ->with('success','Food Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Gate::authorize('foods.delete');
        $this->foodService->foodDelete($id);
        return Redirect::route('foods')
            ->with('success','Food Deleted');
    }
}