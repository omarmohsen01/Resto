<?php

namespace App\Http\Controllers\Services\Dashboard;
use App\Http\Controllers\Interfaces\Dashboard\AdminServiceInterface;
use App\Models\Admin;
use App\Models\RoleUser;
use Exception;
use Illuminate\Support\Facades\DB;


class AdminService implements AdminServiceInterface{
    protected $admin;
    public function __construct(Admin $admin)
    {
        $this->admin=$admin;
    }
    public function indexAdmin($data)
    {
        return $this->admin->filter($data->query())->paginate(5);
    }
    public function adminStore($data)
    {
        DB::beginTransaction();
        try{
            $admin=$this->admin->create($data->all());
            $admin->roles()->attach($data->roles);
            DB::commit();
        }catch(\Exception $e){
            DB::rollBack();
            throw $e;
        }
    }
    public function adminUpdate($data,$admin)
    {
        $admin->update($data->all());
        $admin->roles()->sync($data->roles);
    }
    public function adminDestroy($id)
    {
        $this->admin->destroy($id);
        RoleUser::where('authorizable_id',$id)->delete();
    }
}
