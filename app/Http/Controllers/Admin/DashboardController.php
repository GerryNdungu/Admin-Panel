<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    //
    public function registered()
    {

        $users = User::all();
        return view('admin.users')
            ->with('users',$users);
    }

    public function registeredit(Request $request,$id)
    {
        $user =User::findOrfail($id);
        return view('admin.register-edit')
            ->with('user',$user);
    }

    public function registerupdate(Request $request,$id)
    {
        $user = User::find($id);
        $user->name = $request->input('username');
        $user->usertype = $request->input('usertype');

        $user->update();

        return redirect('/roles-register')
            ->with('status','User role updated');

    }

    public function userdelete($id){
        $user = User::findOrfail($id);

        $user->delete();
        return redirect('/roles-register')
            ->with('status','User deleted');
    }
}
