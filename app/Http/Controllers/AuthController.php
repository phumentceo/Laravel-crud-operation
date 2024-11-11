<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function showLogin(){
        return view('login');
    }

    public function processLogin(Request $request){
        $validator =  Validator::make($request->all(),[
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if($validator->passes()){
            $credentials = [
                "email"  => $request->email,
                "password" => $request->password
            ];
            if(Auth::attempt($credentials)){
                return redirect()->route('product.list')->with("success","You Logged sucessful!");
            }else{
                return redirect()->back()->with('error','Invalid Email or Password');
            }
        }else{
            return redirect()->back()->withInput()->withErrors($validator);
        }
    }


    public function showRegister(){
        return view('register');
    }

    public function processRegister(Request $request){
    
        $validator = Validator::make($request->all(),[
            'name'  => 'required|min:4|max:10',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:4',
            'confirm_password' => 'required|same:password'
        ]);

        if($validator->passes()){
            $user =  new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password =  Hash::make($request->password);
            $user->save();
            return redirect()->route('auth.show.login')->with('success','Registeration successful');
        }else{
            return redirect()->back()->withInput()->withErrors($validator);
        }
    }


    //logout
    public function logout(){
        Auth::logout();  //destory session 
        return redirect()->route('auth.show.login')->with('success','You Logged out successfully!');
    }

    
}
