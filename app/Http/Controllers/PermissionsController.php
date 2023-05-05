<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionsController extends Controller
{
    /**
     * Display a listing of the resource
     * 
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissions    = Permission::all();
        return view('permissions.index', compact('permissions'));
    }

    /**
     * Show form for creating permissions
     * 
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('permissions.create');
    }

    /**
     * Store a newly resource in storage
     * 
     * @param Request $request
     * 
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'  => 'required|unique:permission,name'
        ]);

        Permission::create($request->only(['name']));

        return redirect()->route('permissions.index')->withSuccess(__('Permission created successfully.'));
    }
    
    /**
     * Show the form for editing the specified resource
     * 
     * @param Permission $permission
     * 
     * @return \Illuminate\Http\Response
     */
    public function edit(Permission $permission)
    {
        return view('permissions.edit', ['permission' => $permission]);
    }

    /**
     * Update the specified resource in storage
     * 
     * @param Request $request
     * @param Permission $permission
     * 
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Permission $permission)
    {
        $request->validate([
            'name'  => 'required|unique:permission,name,' . $permission->id,
        ]);

        $permission->update($request->only('name'));

        return redirect()->route('permissions.index')->withSuccess(__('Permission updated successfully.'));
    }

    /**
     * Remove the specified resource from storage
     * 
     * @param Permission $permission
     * 
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permission $permission)
    {
        $permission->delete();
        return redirect()->route('permissions.index')->withSuccess(__('Permission deleted successfully.'));
    }
}
