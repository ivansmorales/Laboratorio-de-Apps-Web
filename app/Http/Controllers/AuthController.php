<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function index()
    {
        $users = User::all();
        return view('auth.index', ['users' => $users]); //index.blade.php
    }

    public function register(Request $req){
        return view('auth.register');
    }

    public function login(Request $req){
        return view('auth.login');
    }

    public function edit($id)
    {
        $users = User::find($id);
        return view('auth.put', ['user' => $users]);
    }

    public function upload(Request $req){
        if($req->hasFile('image')){
            $filename = $req->image->getClientOriginalName();
            $req->image->storeAs('images', $filename, 'public');
            Auth()->user()->update(['image'=>$filename]);
        }
        return redirect()->back();
    }

    public function doRegister(Request $req){
        //\Log::info($req->all()); //Este info lo muestra en debug.
        $data = $req->all();
        // Validador para saber si el usuario escribió el nombre, correo, etc. 
        Validator::make($req->all(), [
            'name' => 'required',
            'email' => 'required | email:rfc,dns',
            'password' => 'required |confirmed',
        ])->validate();
        
        $data['password'] = Hash::make($data['password']);

        User::create($data); //Con eso nos ahorramos el user new User y luego user->name
        return redirect()->back();
    }

    public function doLogin(Request $req){
        $credentials = $req->only('email', 'password');
        if(Auth::attempt($credentials)){
            return redirect()->route('coins.index');
        }
        return redirect()->back();
    }

    public function logout(Request $req){
        Auth::logout();
        $req->session()->invalidate();
        $req->session()->regenerateToken();
        return redirect()->route('coins.index');
    }
}
