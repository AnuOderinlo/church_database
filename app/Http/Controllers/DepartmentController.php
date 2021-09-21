<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Department;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{

    public function index(Department $department, User $users)
    {
        
        $departments = Department::all();
        $users = User::all();

        return view('admin.department', ['departments'=>$departments, 'users'=>$users]);
    }

    public function store(Request $request)
    {
        $department = $request->department;


        $request->validate([
            "department" => ['required', 'string']
        ]);

        Department::create([
            "name" => Str::lower($department),
            "slug" => Str::lower($department)

        ]);

        return back();
    }


    public function destroy(Department $department)
    {
        $department->delete();

        return back();
    }

    
}
