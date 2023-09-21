<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\RoleRequest;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Gate::authorize('roles.view');
        $roles=Role::paginate(5);
        return $roles;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RoleRequest $request)
    {
        Gate::authorize('roles.create');
        Role::createWithAbilities($request);
        return ['message'=>'Role Created Successfully'];
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        Gate::authorize('admins.view');
        return Role::with('abilities')->findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name'=>'required|sometimes|string',
            'abilities'=>"sometimes|required|array"
        ]);
        Gate::authorize('roles.update');
        $role->updateWithAbilities($request);
        return ['message' => 'Role Is Updated'];
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Gate::authorize('roles.delete');
        Role::destroy($id);
        return ['message' => 'Role Is Deleted'];
    }
}
