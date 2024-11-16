<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function index() {
        return view('auth.login');
    }

    public function login(Request $request){
        $valid = Validator::make($request->all(), [
            'email' => 'email|required',
            'password' => 'required'
        ],[
            'email.email' => 'Harus Menggunakan Email',
            'email.required' => 'Email Harus Diisi',
            'password.required' => 'Password Harus Diisi',
        ]);

        if ($valid->fails()) {
            return redirect()->back()->withErrors($valid)->withInput();
        }

        if(Auth::attempt($request->only('email', 'password'))){
            return redirect()->intended('dashboard');
        }

        return back()->withErrors(['email' => 'Email atau password salah.']);
    }

    public function logout(){
        Auth::logout();

        return redirect('login');
    }
}
