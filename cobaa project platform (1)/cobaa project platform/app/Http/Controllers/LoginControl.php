<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginControl extends Controller
{
    public function postlogin (Request $request){
        if (Auth::attempt($request->only('nomor','password'))){
            $User=Auth::user();
            
           if($User->level == 'admin'){
            
            return redirect('/menuutama');
           }else{
            return redirect('/user');
           }


            //else if bisa tinggal only('name''password','level'
        }else
        {
            echo"
            ";
            return redirect('/')->withErrors(['message' => 'Anda bukan pengguna ']);
        }
    }
    public function logout(Request $request){
        Auth::logout();
        return redirect('/');
    }


    
}