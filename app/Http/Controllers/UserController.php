<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    

    public function member()
    {
        $users = User::all();
        return view('admin.members', ['users'=>$users]);
    }

    public function worker()
    {
        $users = User::where('worker', 'yes')->get();
        // dd($users);
        return view('admin.workers', ['users'=>$users]);
    }


    public function profile(User $user)
    {
        $departments = Department::all();
        return view('admin.profile', ['user'=>$user, 'departments'=>$departments]);
    }

    public function update(User $user, Request $request)
    {
        $inputs = $request->validate([
            "firstname"=>['required', 'string', 'max:255' ],
            "lastname"=>['required', 'string', 'max:255' ],
            "worker"=>['required', 'string'],
            "user_image"=>['file'],
            "address"=>['required', 'min:5', 'max:500']
        ]);


        if ($request->hasFile('user_image')) {
            $inputs['user_image'] = $request->file('user_image')->store('images');
           
        }

        $user->update($inputs);

        return back();

        // dd($request->user_image);
    }

    public function join(User $user)
    {
        $user->departments()->attach(request('department'));

        return back();
    }

    public function leave(User $user)
    {
        $user->departments()->detach(request('department'));

        return back();
    }


    public function delete_worker(User $user, Request $request)
    {

        $update =DB::update('update users set worker = ? where id ='. $user->id.'', ['no']);
        $user->departments()->detach();

        return back();
       
    }

    public function delete_member(User $user, Request $request)
    {
        
        $user->delete();
        return back();
    }
   
}
