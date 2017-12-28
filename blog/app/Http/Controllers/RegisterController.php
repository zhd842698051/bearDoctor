<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    //
    public function index(){
        return view("register/index");
    }

    public function register(){
        $this->validate(\request(),
            [
                'name'      =>'required|min:4|max:20|unique:users,name',
                'email'     =>'required|email|unique:users,email',
                'password'  =>'required|min:5|max:30|confirmed'
            ]);
        $name = request('name');
        $password = bcrypt(request("passowrd"));
        $email = request('email');
        $res = User::create(compact('name','email','password'));
        if($res){
            return redirect("login");
        }
    }
}
