<?php 
namespace App\Http\Controllers\Interfaces\Dashboard;

interface TableServiceInterface
{
    public function indexTable();
    public function tableShow($id);
    public function tableStore($data);
    public function tableUpdate($id,$data);
    public function tableDelete($id);
}