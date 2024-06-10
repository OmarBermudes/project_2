<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function login(Request $request){
        $credentials = [
            "email" => $request->email,
            "password" => $request->password,
        ];

        $remember = ($request->has('remember') ? true : false);

        if( Auth::attempt($credentials, $remember) ){
            $request->session()->regenerate();
            return redirect()->intended(route('profile'));
        }else{
            //Errores, logs, etc
            return redirect('login');
        }
    }

    public function register(Request $request){
        if($this->validateEmail($request)){
            $user = new User();

            $user->name = $request->name;
            $user->last_name = $request->last_name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);

            $user->save();

            $request->session()->regenerate();

            Auth::login($user);

             return redirect(route('profile'));
        }else{
            return "Error";
        }

    }

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect(route('login'));
    }

    protected function validateEmail($request){
        return true;
    }
}
