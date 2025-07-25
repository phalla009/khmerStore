<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function loginForm(){

        if(!Auth::check()){
            return view('login-form');
        }
    }
   public function login(Request $request){
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        $remember = !empty($request->remember) ? true : false;

        if(Auth::attempt(
            [
                'name' => $request->username,
                'password' => $request->password,
                'is_admin' => 1,
                'status' => 1,
                'is_delete' => 0
            ], 
            $remember
        )){
            $request->session()->regenerate(); // security: regenerate session on login
            return redirect()->route('dashboard');
        } else {
            return redirect()->back()->with('error', 'Invalid username or password');
        }
    }

    public function logout(){
        if(Auth::check()){
            Auth::logout();
        }
        return redirect()->route('loginForm');
    }


}
