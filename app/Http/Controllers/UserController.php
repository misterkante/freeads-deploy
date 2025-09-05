<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\ViewName;

class UserController extends Controller
{
    //List
    public function index(){
        $users=User::orderBy('created_at', 'desc')->paginate(3);
        return view('users.index', ["users" => $users]);
    }


    //Store a user
    public function store(Request $request){
        $validated = $request->validate([
            'login'=>'required|string|max:255',
            'email'=>'required|email|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'phone'=>'required|string',
        ]);

        User::create([
            'login' => $validated('login'),
            'email' => $validated ('email'),
            'password'=> $validated ('password'),
            'phone'=>$validated ('phone'),
        ]);

        return redirect()->route('users.index')->with('success', 'User Created');
    }


    public function updateUser(Request $request){
            $validated = $request->validate([
            'login'=>'required|string|max:255',
            'phone'=>'required|string',
        ]);

        $user = User::find(Auth::id());
        $user->update($validated);
        $user->save();
        return redirect()->route('users.profile')->with('success', 'Personnal infos updated');
    }

    public function deleteUser(){
        $user = User::find(Auth::id());
        $user->delete();
    }

    public function showProfile() {
        $user = Auth::user();
        return view('users.profil',compact('user') );
    }


    public function showMyAds() {
        $ads = Ad::where('user_id', Auth::id())->get();
        return view('users.myads', compact('ads'));
    }
    public function showSettings() {
        return view('users.settings');
    }
}
