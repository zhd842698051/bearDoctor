<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    //登录
    public function login()
    {
        return view('login/login');
    }

    public function loginDo(Request $request)
    {

    	$res=$this->validate($request,[
    		'username'	=>	'required|min:6|max:16',
    		'password'	=>	'required|min:6|max:16',
    	]);
    	
    	$user = request(['username','password']);
    	if(\Auth::attempt($user)){
    		return redirect('/');
    	}else{
    		echo "<script>alert('账号或密码错误');</script>";
    	}
    	//return \Redirect::back()->withErrors("用户名和密码不匹配");

    	$user = request(['username','password']);
      $remember = request('checked');
      if($remember !== 1){
          if(\Auth::attempt($user)){
            return redirect('/');
          }else{
            echo "<script>alert('账号或密码错误');</script>";
          }
      }else{
          if (\Auth::attempt(['username' => $user['username'], 'password' => $user['password']], $remember)) {
              return redirect('/');
          }
      }


    }

    //qq回调地址
    public function qqCallback()
    {
        return 'qq回调地址';
    }

    //退出
    public function logout()
    {
        auth()->logout();

        return redirect('/login');
    }
}
