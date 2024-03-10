<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(){
        $data = [
            'title' => 'Login',
            'subTitle' => null,
            'page_id' => null
        ];
        return view('auth.login',  $data);
    }

    public function login_submit(Request $request){
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if ($user->is_active) {
                return redirect()->route('dashboard');
            } else{
                Auth::logout();
                return redirect()->route('login')->with('warning', 'Your account has been deactivated');
            }
        } else {
            return redirect()->route('login')->with('error', 'Username and password are incorrect, please try again');
        }
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
}
