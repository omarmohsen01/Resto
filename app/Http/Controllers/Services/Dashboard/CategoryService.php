<?php 
namespace App\Http\Controllers\Services\Dashboard;

use App\Http\Controllers\Interfaces\Dashboard\CategoryServiceInterface;
use App\Models\Category;
use Illuminate\Support\Str;


class CategoryService implements CategoryServiceInterface
{
    protected $category;
    public function __construct(Category $category)
    {
        $this->category=$category;   
    }

    public function indexCategory()
    {
        $request=request();
        $query=$this->category->query();
        if($name=$request->query('name')){
            $query->where('name','LIKE',"%{$name}%");
        }if($status=$request->query('status')){
            $query->where('status','=',$status);
        }
        return $query->paginate(8);
    }

    public function categoryShow($id)
    {
        //
    }

    public function categoryStore($data)
    {
        $data->merge([
            'slug'=> Str::slug($data->post('name'))
        ]);
        
        return $this->category->create($data->all());
    }

    public function categoryUpdate($id,$data)
    {
        $category=$this->category->find($id);
        $category->update($data->all());
    }

    public function categoryDelete($id)
    {
        $category=$this->category->findOrFail($id);
        $category->delete();
    }
}