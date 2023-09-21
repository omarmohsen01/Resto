<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\RoleRequest;
use App\Models\Role;
use App\Models\RoleAbility;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Gate::authorize('roles.view');
        $roles=Role::paginate();
        return view('admin.role.index',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Gate::authorize('roles.create');
        return view('admin.role.create',['role'=>new Role()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RoleRequest $request)
    {
        Gate::authorize('roles.create');
        Role::createWithAbilities($request);
        return redirect()
                ->route('roles')
                ->with('success','Role Created Successfully');

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
    public function edit(Role $role)
    {
        Gate::authorize('roles.update');
        $role_abilities=$role->abilities()->pluck('type','ability')->toArray();
        return view('admin.role.edit',compact('role','role_abilities'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RoleRequest $request, Role $role)
    {
        Gate::authorize('roles.update');

        $role->updateWithAbilities($request);

        return redirect()
            ->route('roles')
            ->with('success','Role Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Gate::authorize('roles.delete');
        Role::destroy($id);
        return redirect()
            ->route('roles')
            ->with('success','Role Deleted Successfully');
    }
}
