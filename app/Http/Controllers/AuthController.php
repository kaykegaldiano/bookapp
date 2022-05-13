<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // display login page
    public function loginPage()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('books');
        }

        return back()->withErrors([
            'error' => 'The provided credentials do not match our records'
        ]);
    }

    public function registerPage()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:3',
            'email' => 'required|email',
            'confirmEmail' => 'required|email',
            'password' => 'required|min:6|max:20',
            'confirmPassword' => 'required|min:6|max:20'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->confirmEmail,
            'password' => Hash::make($request->password)
        ]);

        return redirect()->route('auth.login')->with('message', 'User registered with success!');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
