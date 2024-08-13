<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function index()
    {
        return view('login');
    }   
    public function login(Request $request)  {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

// cek apakah login valid
if (Auth::attempt($credentials)) {

            $request->session()->regenerate();
        if(Auth::user()->role_id == 1){
            return redirect('dashboard');
        }
        // jika user client
        if(Auth::user()->role_id == 2){
            return redirect('home');
        }
            // return redirect();
        }
        Session::flash('status','failed');
        Session::flash('message','login invalid');
        return redirect('/');
    } 

    public function logout(Request $request){
        Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/');
    }

   
}
