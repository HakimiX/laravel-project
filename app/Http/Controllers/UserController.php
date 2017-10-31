<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class UserController extends Controller {

    // POST - Sign Up
    public function postSignUp(Request $request){

        // Validation
        $this->validate($request, [
            'email' => 'required|email|unique:users',
            'first_name' => 'required|max:120',
            'password' => 'required|min:4'
        ]);

        // form data
        $email = $request['email'];
        $first_name = $request['first_name'];
        $password = bcrypt($request['password']);  

        // New instance of User 
        $user = new User();
        $user->email = $email;
        $user->first_name = $first_name;
        $user->password = $password;

        // Save to database
        $user->save();

        // Login user
        Auth::login($user);

        // Redirect to Dashboard
        return redirect()->route('dashboard');
    }

    // POST - Sign In
    public function postSignIn(Request $request){

        // Validation
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required'
        ]);

        // Authentication - Try to log in user with credentials
        if (Auth::attempt(['email' => $request['email'], 'password' => $request['password']])){
            return redirect()->route('dashboard');
        }

        return redirect()->back();
    }

    public function getLogout(){

        Auth::logout();

        return redirect()->route('login');
    }
}

