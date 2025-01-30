<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class AuthController extends Controller
{
    public function register(Request $request){
        $fields = $request->validate([
            'username'=>['required','max:255'],
            'email'=>['required','max:255','email','unique:users'],
            'password'=>['required','min:3','confirmed'],
        ]);
        
        $user = User::create($fields);

        FacadesAuth::login($user);

        return redirect()->route('home');
    }
    public function login(Request $request){
        $fields = $request -> validate([
            'email'=>['required','max:255','email'],
            'password'=>['required'],
        ]);
       if(FacadesAuth::attempt($fields, $request->remember)){
            return redirect()->intended('dashboard');
       }
       else{
        return back()->withErrors([
            'failed'=> 'Invalid Credentials'
        ]);
       } 
    }
    public function logout(Request $request){
        FacadesAuth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('home');
    }
}
