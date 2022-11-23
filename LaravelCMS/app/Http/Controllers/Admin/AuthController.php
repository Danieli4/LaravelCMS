<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function index (){

        return view('admin.auth.login');
    }

    public function login(Request $request){
        $data = $request->validate([
            "email" => ["required", "email", "string"],
            "password" => ["required"],
        ]);


        if (auth("admin")->attempt($data))
        {
            return redirect()->route('admin.posts.index');
        }
        return redirect()->route('admin.login')->withErrors(["email"=>"Пользователь не найден, или данные введены неверно" ]);
    }

    public function logout(){
        auth("amin")->logout();

        return redirect()->route('home');
    }
}
