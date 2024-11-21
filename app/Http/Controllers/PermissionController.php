<?php

namespace App\Http\Controllers;
use App\Http\Controllers;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{

    public function __construct()
    {
        // $this->middleware('roles_or_permission:Permission access|Permission create|Permission edit
        // |Permission delete',['only' => ['index','show']]);
        $this->middleware('roles_or_permission:Permission create',['only' => ['create','store']]);
        $this->middleware('roles_or_permission:Permission edit',['only' => ['edit','update']]);
        $this->middleware('roles_or_permission:Permission delete',['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $permissions = Permission::latest()->get();
        $data = compact('permissions');
        return view('permission')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $url = url('/permission/add');
        $title = 'Please Fill Up Permission Details';
        $btext = "Submit";
        $data = compact('url', 'title', 'btext');
        return view('addpermission')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'pname' =>'required'
            ]);

            $permission = new Permission;
            $permission->name = $request['pname'];
            $permission->save();

            return redirect()->back()->withSuccess('Permission Created !!!');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors('Failed to create permission: ' . $e->getMessage());
        }
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
        $permission = Permission::find($id);
        if(is_null($permission))
        {
            return redirect()->back()->withErrors('error', 'Permission not found.');
        }
        else
        {
            $url = url('/permission/update').'/'.$id;
            $title = 'Update Permission Details';
            $btext = "Update";
            $data = compact('url', 'title', 'btext','permission');
            return view('addpermission')->with($data);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         $request->validate([
            'pname' => 'required'
         ]);

         $permission = Permission::find($id);
         $permission->name = $request['pname'];
         $permission->save();
         return redirect('permission')->withSuccess('Permission Updated  !!!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $permission = Permission::find($id);
        if (!$permission) {
            return redirect()->back()->withErrors('Permission not found.');
        }

        if ($permission->delete()) {
            return redirect()->back()->withSuccess('Permission Deleted !!!');
        } else {
            return redirect()->back()->withErrors('Permission deletion failed.');
        }

    }
}
