<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Department;
use Illuminate\Http\Request;

class userController extends Controller
{

    public function login(Request $request) {

        $data = $request->validate([
            'loginemail' => ['required', 'email'],
            'loginpassword' => ['required', 'min:5' ,'max:100']
        ]);
        $password = $data['loginpassword'];
        $email = $data['loginemail'];
       

        $next = "/";
        if (auth()->attempt(['email' => $email, 'password'=>$password])) {
            $request->session()->regenerate();

            $user = User::where('email', $email)->first();
            if (! $user->is_admin)
                $next = "/user/$user->id";
        }
        
        return redirect($next);
    }

    public function logout() {
        auth()->logout();
        return redirect("/");
    }

    
    public function dashboard(Request $request) {

        $users = [];
        if ($request->has('search')) {

            $searchInput = $request->input('search');

            $users = User::where(function ($query) use ($searchInput) {
                $query->where('email', 'like', '%' . $searchInput . '%')
                    ->orWhere('firstname', 'like', '%' . $searchInput . '%')
                    ->orWhere('lastname', 'like', '%' . $searchInput . '%');
            })->get();

        }
        else {
            $users = User::all();
        }
        return view('home', ['users'=> $users]);
    }

    public function createUser(Request $request) {

        $data = $request->validate([
            'firstname' => ['required', 'min:3', 'max:20'],
            'lastname' => ['required', 'min:3', 'max:20'],
            'gender' => ['required'],
            'email' => ['required', 'email'],
            'department_id' => ['required'],
            'password' => ['required', 'min:5' ,'max:100']
        ]);

        $data['passowrd'] = bcrypt($data['password']);

        if($request->file('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('Images'), $filename);
            $data['image']= $filename;
        }
    
        $user = User::create($data);
        return redirect("/");
    }


    function createUserView () {
        $departments = Department::all();
        return view('createUser', ['departments' => $departments]);
    }


    public function getUser($id) {
        $user = User::find($id);
        if ( !$user ) {
            return "error 404 user not found";
        }
        $department = Department::find($user->department_id);
        return view('userProfile',['user'=>$user , 'dname' => $department->name ]);
    }

    public function deleteUser($id) {
        $user = User::find($id);
        if ( !$user ) {
            return "error 404 user not found";
        }
        $user->delete();
        return "User with ID: $id has been successfully deleted.";
    }

    public function editUser(Request $request ,$id) {

        $user = User::find( $id);
        if ( !$user ) {
            return "error 404 user not found";
        }
        
        $request->validate([
            'firstname' => ['required', 'min:3', 'max:20'],
            'lastname' => ['required', 'min:3', 'max:20'],
            'gender' => ['required'],
            'email' => ['required', 'email'],
            'department_id' => ['required'],
        ]);

        $user->firstname = $request->input('firstname');
        $user->lastname = $request->input('lastname');
        $user->email = $request->input('email');
        $user->gender = $request->input('gender');
        $user->department_id = $request->input('department_id');
        


        if ($request->input('password')) {
            $request->validate(['password' => ['required', 'min:5' ,'max:100']]);
            $user->password = bcrypt($request->input('password'));
        }
        $user->save();

        return redirect("/user/$user->id");
    }

    public function editUserView($id) {

        $user = User::find($id);
        if ( !$user ) {
            return "error 404 user not found";
        }

        $departments = Department::all();
        return  view('editUser', ['user'=> $user, 'departments' => $departments]);
    }
}
