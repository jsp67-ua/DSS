<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function register(Request $request){
        
        $this->validate($request, [
            'name' => 'required|max:50|name',
            'address' => 'nullable',
            'email' => 'required|max:50|email',
            'password' =>'required|confirmed',
        ]);


        $user = new User();

        $user->name = $request->name;
        $user->address = $request->address;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        $user->save();

        Auth::login($user);

        return redirect(route('main'));
    }

    public function login(Request $request){
        
        $this->validate($request, [
            'name' => 'required|max:50|name',
            'password' =>'required|confirmed',
        ]);

        $credentials = [
            "name" => $request->name,
            "password" => $request->password
        ];

        //$remember = ($request->has('remember') ? true : false); Mantener sesion iniciada

        if(Auth::attempt($credentials)){ //añadir varaible remember para mantener sesion

            $request->session()->regenerate();

            return redirect()->intended('main');
        }else{
            return redirect(route('login'));
        }

    }

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect(route('login'));
    }
}