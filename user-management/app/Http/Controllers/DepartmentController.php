<?php

namespace App\Http\Controllers;
use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function createDepartment(Request $request) {

        $data = $request->validate([
            'name' => ['required', 'min:3', 'max:20'],
        ]);

        $dep = Department::create($data);
        return redirect("/");
    }

    public function createDepartmentView (Request $request) { 
        return view('createDepartment');
    }


}
