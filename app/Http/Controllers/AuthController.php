<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use App\Models\User;
use Dotenv\Exception\ValidationException;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationData;

class AuthController extends Controller
{
    public function showRegister(){
        return view('auth.register');
    }

    public function showLogin(){
        return view('auth.login');
    }

    public function register(Request $request){
        $validated = $request->validate([
            'login'=>'string|max:255',
            'email'=>'required|email|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'phone'=>'required|string|phone:AUTO',
        ]);

        $user = User::create([
            'login' => $request->login,
            'email'=> $request->email,
            'password' => $request->password,
            'phone' => phone($request->phone)->formatE164(),
        ]);

        event(new Registered($user));
        Auth::login($user);

        return redirect()->route('verification.notice');
    }

    public function login(Request $request){
        $validated= $request->validate([
            'email'=>'required|email|',
            'password' => 'required|string|',
        ]);

       if (Auth::attempt($validated)) {
        $request->session()->regenerate(); //Regenerate session id to prevent session attack
        return redirect()->intended('/');
       }

       return back()->withErrors ([
        'email' => 'Sorry, incorrect credentials',
       ])->onlyInput('email');
    }

    public function logout(Request $request): RedirectResponse{
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
