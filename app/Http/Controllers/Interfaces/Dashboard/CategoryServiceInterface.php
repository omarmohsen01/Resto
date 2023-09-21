<?php
namespace App\Http\Controllers\Interfaces\Dashboard;

interface CategoryServiceInterface
{
    public function indexCategory();
    public function categoryShow($id);
    public function categoryStore($data);
    public function categoryUpdate($id,$data);
    public function categoryDelete($id);
}
