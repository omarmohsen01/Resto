<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Interfaces\Dashboard\AdminServiceInterface;
use App\Http\Requests\AdminRequest;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Role;
use App\Models\RoleUser;
use Illuminate\Support\Facades\Gate;

class AdminController extends Controller
{
    protected $adminService;
    public function __construct(AdminServiceInterface $adminService)
    {
        $this->adminService=$adminService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        Gate::authorize('admins.view');
        $admins=$this->adminService->indexAdmin($request);
        return view('admin.admin.index',compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Gate::authorize('admins.create');
        return view('admin.admin.create',[
            'roles'=>Role::all(),
            'admin'=>new Admin()
    ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AdminRequest $request)
    {
        Gate::authorize('admins.create');
        $this->adminService->adminStore($request);
        return redirect()->route('admins')->with('success','The Admin Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Admin $admin)
    {
        Gate::authorize('admins.update');
        $roles=Role::all();
        $admin_roles=$admin->roles()->pluck('id')->toArray();
        return view('admin.admin.edit',compact('roles','admin','admin_roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,Admin $admin)
    {
        Gate::authorize('admins.update');
        $request->validate([
            'name'=>"required|string|max:255|unique:admins,name,$admin->id",
            'email'=>"required|email|max:255|unique:admins,email,$admin->id",
            'password'=>"required",
            'super_admin'=>"required|exists:admins,super_admin",
            'roles'=>"required|array"
        ]);
        $this->adminService->adminUpdate($request,$admin);
        return redirect()->route('admins')->with('success','The Admin Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Gate::authorize('admins.delete');
        $this->adminService->adminDestroy($id);
        return redirect()->route('admins')->with('success','The Admin Deleted Successfully');
    }
}
