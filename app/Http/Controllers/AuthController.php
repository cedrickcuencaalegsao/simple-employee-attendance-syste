<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

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
        if (Auth::attempt($credentials)) {
            $this->handleRedirect();
        }

        return redirect()->back()->with('error', 'Invalid credentials');
    }

    private function handleRedirect()
    {
        if (Auth::user()->is_admin) {
            return redirect()->route('dashboard');
        } else {
            return redirect()->route('view.attendance');
        }
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();

        return redirect()->route('login.page')->with('success', 'Logout successful');
    }

    public function index()
    {
        return view('login');
    }

    public function showUpdatePassword()
    {
        return view('updatePassword');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'new_password' => 'required|string|min:6',
            'confirm_password' => 'required|string|same:new_password',
        ]);

        $user = \App\Models\User::where('email', $request->email)->first();
        if (! $user) {
            return redirect()->back()->with('error', 'User not found.');
        }

        $user->password = Hash::make($request->new_password);
        $user->save();

        return redirect()->route('login.page')->with('success', 'Password updated successfully.');
    }
}
