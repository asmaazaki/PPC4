<?php

namespace Modules\AdminModule\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class AdminAuthController extends Controller
{
    public function loginForm()
    {

        return view('adminmodule::auth.Login');
    }


    public function login(Request $request){

        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
      // dd(Auth::attempt($credentials));
        if (Auth::attempt($credentials)) {

            $request->session()->regenerate();
            return redirect()->route('afterLogin');
        }
        else{
        return back()->withErrors([
            'email' => 'The Email Or Password Is Not Correct',
        ])->onlyInput('email');
        }
     }


     public function logout(Request $request): RedirectResponse
     {
         Auth::logout();

         $request->session()->invalidate();

         $request->session()->regenerateToken();

         return redirect()->route('loginForm');
     }
}