<?php

namespace App\Http\Controllers;

use App\Models\User;
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

    
    public function dashboard() {
        $users = User::all();
        return view('home', ['users'=> $users]);
    }

    public function createUser(Request $request) {

        $data = $request->validate([
            'firstname' => ['required', 'min:3', 'max:20'],
            'lastname' => ['required', 'min:3', 'max:20'],
            'gender' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required', 'min:5' ,'max:100']
        ]);

        $data['passowrd'] = bcrypt($data['password']);
        $user = User::create($data);
        return redirect("/");
    }


    public function getUser($id) {
        $user = User::find($id);
        if ( !$user ) {
            return "error 404 user not found";
        }

        return view('userProfile',['user'=>$user]);
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

        $user->firstname = $request->input('firstname');
        $user->lastname = $request->input('lastname');
        $user->email = $request->input('email');
        $user->gender = $request->input('gender');

        if ($request->input('password')) {
            $user->password = bcrypt($data['password']);
        }
        $user->save();

        return redirect("/user/$user->id");
    }

    public function editUserTemplate($id) {

        $user = User::find($id);
        if ( !$user ) {
            return "error 404 user not found";
        }
        return  view('editUser', ['user'=> $user]);
    }
}
