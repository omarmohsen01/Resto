<?php 
namespace App\Http\Controllers\Interfaces\Dashboard;

interface FoodServiceInterface
{
    public function indexFood();
    public function foodShow($id);
    public function foodStore($data);
    public function foodUpdate($id,$data);
    public function foodDelete($id);
}