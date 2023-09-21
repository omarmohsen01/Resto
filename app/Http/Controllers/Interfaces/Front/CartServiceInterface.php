<?php 

namespace App\Http\Controllers\Interfaces\Front;

use App\Models\Food;
use Illuminate\Support\Collection;

interface CartServiceInterface
{
    public function get() : Collection;

    public function add(Food $food,$quantity,$size);

    public function update($id,$quantity=1,);
    
    public function delete($id);

    public function empty();

    public function total() ;    
} 