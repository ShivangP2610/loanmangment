<?php

namespace App\Http\Controllers;

use Illuminate\Validation\Rule;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        $data = compact('users');
        return view('allusers')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::all();
        $url = url('/adduser');
        $title = 'Please Fill Up User Details';
        $btext = "Submit";
        $data = compact('url', 'title', 'btext','roles');
        return view('adduser')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $request->validate([
        'uname'  => 'required',
        'uemail' => 'required|email',
        'upass'  => 'required|min:6',
        'rname'  => 'required'
       ]);

       $user = User::create([
        'name' => $request['uname'],
        'email' => $request['uemail'],
        'password'  => bcrypt($request['upass'])
       ]);

       $user->syncRoles($request['rname']);
       return redirect('/alluser')->withSuccess('User Created');

    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    // public function edit(User $user)
    // {
    //     echo $user;
    // }
    public function edit($id)
    {
        $roles = Role::get();
        $user = User::with('roles')->find($id);

        if(is_null($user))
        {
           return redirect()->back()->withErrors('error', 'User not found.');
        }
        else
        {
            $url = url('/user/update').'/'.$id;
            $title = 'Update User Details';
            $btext = "Update";
            $data = compact('url', 'title', 'btext','roles','user');
            return view('adduser')->with($data);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request, User $user)
    // {
    //     //
    // }
    public function update(Request $request, $id)
    {

        $request->validate([
            'uname'  => 'required',
            'uemail' => 'required|email',
            'rname'  => 'required'
           ]);
        $user = User::find($id);

        if (!$user) {
            return redirect()->back()->withErrors('User not found.');
        }
        else
        {
            $user->name = $request['uname'];
            $user->email = $request['uemail'];

            $user->syncRoles($request['rname']);
            $user->save();

            return redirect('/alluser')->withSuccess('User updated successfully.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
         $user = User::find($id);
         if(!$user)
         {
            return redirect()->back()->withErrors('User Not Deleted ');
         }
         $user->delete();
         return redirect()->back()->withSuccess('User Deleted Successfuly');
    }
}
