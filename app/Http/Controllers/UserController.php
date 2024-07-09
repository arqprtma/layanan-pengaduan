<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;


class UserController extends Controller
{
    //
    public function register(Request $request) {
    
        // dd($request->all());

        // $user_find = User::where('email', $request->email)->orWhere('username', $request->username)->first();
        // if($user_find){
        //     return redirect()->route('register')->with('error', 'Email atau Username sudah di gunakan')->withInput();;
        // }

        $data_request = [
            'name' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ];

        $user = User::create($data_request);

        event(new Registered($user));

        Auth::login($user);

        return redirect()->route('login');
    }

    public function login(Request $request) {
       
        $credentials = $request->validate([
            'email' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->route('dashboard');
        }

        return back()->withErrors(['errors' => $credentials])->withInput();
    }

    public function logout(){
        Auth::logout();

        return redirect()->route('login');
    }
}
