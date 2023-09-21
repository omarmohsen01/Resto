<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CalcOrder extends Component
{
    public $food;
    public $quantity = 1;
    public $selectedSize = 'small';
    public $total = 0;
    public function render()
    {
        return view('livewire.calc-order');
    }

    public function calculateTotal()
    {
        $selectedSizePrice = $this->food->{$this->selectedSize};
        $this->total = $this->quantity * $selectedSizePrice;
    }
}