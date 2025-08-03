<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //
    public function create()
    {
        return view('user.create');

    }
    public function store(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:6',
        ]);
        $user= new User();
        $user->name=$request->name;
        $user->email = $request->email;
        $user->password =Hash::make($request->password);
        $user->save();
        return redirect('/');
    }
    public function login(){
        return view('user.login');
    }
    public function auth(Request $request)
    {
        // Validate the request inputs
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        // Attempt authentication
        if (Auth::attempt($request->only('email', 'password'))) {
            $request->session()->regenerate();
            return redirect()->route('myposts');
        }
 return redirect()->route('login')->with('error', 'Failed to login. Please check your credentials.');
    }

    public function profile($id){
        $post=Post::with('category','user')->find($id);
        return view('profile',compact('post'));
    }
    public function logout()
    {
        auth()->logout();
        return redirect('/');


    }
}
