<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Interfaces\Dashboard\AdminServiceInterface;
use App\Http\Requests\AdminRequest;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class AdminController extends Controller
{
    protected $adminService;
    public function __construct(AdminServiceInterface $adminService)
    {
        $this->adminService=$adminService;
        $this->middleware('auth:sanctum');
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // $admin=$request->user();
        // if(!$admin->tokenCan('admins.show')){
        //     abort(403,'Not Allowed');
        // }
        Gate::authorize('admins.view');
        return $this->adminService->indexAdmin($request);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AdminRequest $request)
    {
        Gate::authorize('admins.store');
        $this->adminService->adminStore($request);
        return ['message'=>'Admin Created Successfully'];
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        Gate::authorize('admins.view');
        return Admin::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Admin $admin)
    {
        Gate::authorize('admins.update');
        $request->validate([
            'name'=>"sometimes|required|string|max:255|unique:admins,name,$admin->id",
            'email'=>"sometimes|required|email|max:255|unique:admins,email,$admin->id",
            'password'=>"sometimes|required",
            'super_admin'=>"sometimes|required|exists:admins,super_admin",
            'roles'=>"sometimes|required|array"
        ]);
        $this->adminService->adminUpdate($request,$admin);
        return ['The Admin Updated Successfully'];
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Gate::authorize('admins.delete');
        $this->adminService->adminDestroy($id);
        return ['The Admin Deleted Successfully'];
    }
}
