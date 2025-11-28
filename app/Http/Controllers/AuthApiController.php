<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthApiController extends Controller
{
 

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required'
        ]);

        if (!Auth::attempt($request->only('email', 'password'))) {
            return back()->withErrors(['email' => 'Invalid credentials'])->withInput();
        }

        $user = Auth::user();

        // Generate token
        $token = $user->createToken('login-token')->plainTextToken;

        return redirect()->route('tokens.index')->with('token', $token);
    }
    public function logout(Request $request)
        {
            auth()->logout();

            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect('/login')->with('success', 'Logout berhasil.');
        }
    public function mocup(){
        return view('mocup.index');
    }
    public function about(){
        return view('profile');
    }
    public function porto(){
        return view('portofolio');
    }
    public function blog(){
        return view('blog');
    }
    public function detail(){
        return view('detailblog');
    }
    public function contact(){
        return view('contact');
    }

}
