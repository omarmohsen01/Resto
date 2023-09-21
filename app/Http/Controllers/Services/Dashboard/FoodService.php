<?php
namespace App\Http\Controllers\Services\Dashboard;

use App\Http\Controllers\Interfaces\Dashboard\FoodServiceInterface;
use App\Models\Food;
use Illuminate\Support\Str;


class FoodService implements FoodServiceInterface
{
    protected $food;
    public function __construct(Food $food)
    {
        $this->food=$food;
    }
    
    public function indexFood()
    {
        $request=request();
        $query=$this->food->query();
        if($name=$request->query('name')){
            $query->where('name','LIKE',"%{$name}%");
        }if($status=$request->query('status')){
            $query->where('status','=',$status);
        }
        return $query->with('category')->paginate(8);
    }

    public function foodStore($data)
    {
        $data=$data->merge([
            'slug'=>Str::slug($data->post('name')),
        ]);
        $this->food->create($data->all());
    }

    public function foodShow($id)
    {
        //
    }

    public function foodUpdate($id, $data)
    {
        $food=$this->food->find($id);
        $food->update($data->all());
    }

    public function foodDelete($id)
    {
        $food=$this->food->findOrFail($id);
        $food->delete();
    }
}