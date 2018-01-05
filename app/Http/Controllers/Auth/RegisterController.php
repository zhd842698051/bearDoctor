<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    //注册
    public function register()
    {
        return view('register/register');
    }

    //执行注册
    public function registerDo(Request $request){
    	$data=$request->all();
    	//dd($data);
    	//验证数据安全
    	$res=$this->validate($request,[
    		'username'	=>	'required|min:6|max:16|unique:user,username',
    		'password'	=>	'required|min:6|max:16',
    		'email'		=>	'required',
    		'phone'		=>	'required',
    	]);

    	$username = $data['username'];
    	$password = bcrypt($data['password']);
    	$email = $data['email'];
    	$phone = $data['phone'];

    	$user = User::create(['username'=>$username,'password'=>$password,'email'=>$email,'phone'=>$phone]);

    	auth()->login($user);

        return redirect('/');
    }

    //验证 验证码
    public function checkCaptcha(Request $request){
    	$data = $request->all();
    	$captcha = $data['captcha'];
    	if(!captcha_check($captcha)){
    		$res['error']=0;	
    	}else{
    		$res['error']=1;
    	}
    	echo json_encode($res);
    }

    //验证用户名是否唯一
    public function checkUsername(Request $request){
    	$username=request('username');
    	
    	$user=User::where('username','=',$username)->get()->toArray();
    	if(isset($user[0]['username'])){
    		$res['error']=0;
    	}else{
    		$res['error']=1;
    	}
    	echo json_encode($res);
    }
}
