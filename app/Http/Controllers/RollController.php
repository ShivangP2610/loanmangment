<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;


class RollController extends Controller
{

    public function __construct()
    {
        // $this->middleware('roles_or_permission:Permission access|Permission create|Permission edit
        // |Permission delete',['only' => ['index','show']]);
        $this->middleware('roles_or_permission:Role create',['only' => ['create','store']]);
        $this->middleware('roles_or_permission:Role edit',['only' => ['edit','update']]);
        $this->middleware('roles_or_permission:Role delete',['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::latest()->get();
        $data = compact('roles');
        return view('rollview')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permissions = Permission::latest()->get();
        $url = url('/role/add');
        $title = 'Please Fill Up Role Details';
        $btext = "Submit";
        $data = compact('url', 'title', 'btext','permissions');
        return view('addrole')->with($data);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'rname' => 'required',
            'pname' => 'required|array'
        ]);

        $roleName = ucfirst($request->input('rname'));
        $guardName = 'web';

        // Create the role
        $role = Role::create([
            'name' => $roleName,
            'guard_name' => $guardName,
        ]);

        // Retrieve permission models based on their names
        $permissions = [];
        foreach ($request->input('pname') as $permissionName) {
            $permission = Permission::where('id', $permissionName)->first();
            if ($permission) {
                $permissions[] = $permission;
            }
        }

        // Attach permissions to the role
        $role->syncPermissions($permissions);

        return redirect('/role')->with('success', 'Role created successfully.');
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
    public function edit(string $id)
    {
       $permissions = Permission::latest()->get();
       $roll = Role::find($id);
       if(is_null($roll))
       {
           return redirect()->back()->withErrors('error', 'Role not found.');
       }
       else
       {
           $url = url('/role/update').'/'.$id;
           $title = 'Update Role Details';
           $btext = "Update";
           $data = compact('url', 'title', 'btext','roll','permissions');
           return view('addrole')->with($data);
       }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'rname' => 'required',
            'pname' => 'required|array'
        ]);

        $roleName = ucfirst($request->input('rname'));
        $guardName = 'web';

        $role = Role::find($id);

        if (!$role) {
            return redirect()->back()->withErrors('Role not found.');
        }

        // Update role name
        $role->name = $roleName;
        $role->save();

        $permissions = [];
        foreach ($request->input('pname') as $permissionId) {
            $permission = Permission::find($permissionId);
            if ($permission) {
                $permissions[] = $permission;
            }
        }

        //delete existing permission
        $role->permissions()->detach();

        // add new permission
        $role->syncPermissions($permissions);

         return redirect('/role')->with('success', 'Role updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $role = Role::find($id);

        if (!$role) {
            return redirect()->back()->withErrors('Role not found.');
        }

        if ($role->delete()) {
            return redirect()->back()->withSuccess('Role Deleted !!!');
        } else {
            return redirect()->back()->withErrors('Role deletion failed.');
        }
    }
}
