<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Food;
use Livewire\Component;

class Menu extends Component
{
    public $categories;
    public $selectedCategoryId;
    public $limit;
    public $activeCategoryId;

    public function mount()
    {
        $this->categories = Category::with('foods')->get();
    }
    
    public function render()
    {
        return view('livewire.menu');
    }
    
    public function showFoods($categoryId)
    {
        $this->selectedCategoryId = $categoryId;
        $this->activeCategoryId = $categoryId;

    }

}