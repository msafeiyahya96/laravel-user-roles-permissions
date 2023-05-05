<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesController extends Controller
{
    function __construct()
    {
        
    }

    /**
     * Display a listing of the resource
     * 
     * @param Request $request
     * 
     * @return [type]
     */
    public function index(Request $request)
    {
        $roles  = Role::orderBy('id', 'DESC')->paginate(5);
        return view('roles.index', compact('roles'))->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource
     * 
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions    = Permission::get();
        return view('roles.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage
     * 
     * @param Request $request
     * 
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'          => 'required|unique:roles,name',
            'permission'    => 'required'
        ]);

        $role   = Role::create(['name' => $request->get('name')]);
        $role->syncPermissions($request->get('permission'));

        return redirect()->route('roles.index')->with('success', 'Role created successfully.');
    }

    /**
     * Display the specified resource
     * 
     * @param Role $role
     * 
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        $role               = $role;
        $rolePermissions    = $role->permissions;

        return view('roles.show', compact('role', 'rolePermissions'));
    }

    /**
     * Show the form for editing the specified resource
     * 
     * @param Role $role
     * 
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        $role               = $role;
        $rolePermissions    = $role->permissions->pluck('name')->toArray();
        $permissions        = Permission::get();

        return view('roles.edit', compact('role', 'rolePermissions', 'permissions'));
    }

    /**
     * Update the specified resource in storage
     * 
     * @param Role $role
     * @param Request $request
     * 
     * @return \Illuminate\Http\Response
     */
    public function update(Role $role, Request $request)
    {
        $this->validate($request, [
            'name'          => 'required',
            'permission'    => 'required'
        ]);

        $role->update($request->only('name'));

        $role->syncPermissions($request->get('permission'));

        return redirect()->route('roles.index')->with('success', 'Role updated successfully.');
    }

    /**
     * Remove the specified resource from storage
     * 
     * @param Role $role
     * 
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->route('roles.index')->with('success', 'Role deleted successfully.');
    }
}
