<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        // Validate the request
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);
        $credentials = $request->only('username', 'password');
        if(Auth::attempt($credentials)){
            $this->handleRedirect();
        }
        return redirect()->back()->with('error', 'Invalid credentials');
    }

    private function handleRedirect(){
        if(Auth::user()->is_admin){
            return redirect()->route('dashboard');
        }else{
            return redirect()->route('view.attendance');
        }
    }

    public function logout(){
        Session::flush();
        Auth::logout();
        return redirect()->route('login.page')->with('success', 'Logout successful');
    }
    public function index(){
        return view('login');
    }
}
