<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;
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

    //Create page

    public function create (){
        return view('users.create');
    }

    //Edit page

    public function edit(User $user){
        return view('users.edit');
    }

    public function update(Request $request){
            $validated = $request->validate([
            'login'=>'required|string|max:255',
            'email'=>'required|email|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'phone'=>'required|string',
        ]);
        User::update([
            'login' => $validated('login'),
            'email' => $validated ('email'),
            'password'=> $validated ('password'),
            'phone'=>$validated ('phone'),
        ]);
        return redirect()->route('users.index')->with('success', 'User Infos updated');
    }

    //Destroy
    public function destroy (string $id){
        $user = User::find($id);
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User deleted');
    }

}
