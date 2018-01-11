<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Http\Controllers\Auth\Socialite;
use App\User;
use Carbon\Carbon;


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

//    	$user = request(['username','password']);
//    	if(\Auth::attempt($user)){
//            $res=self::now();
//    		return redirect('/');
//    	}else{
//    		echo "<script>alert('账号或密码错误');location.href='/login'</script>";
//    	}
    	//return \Redirect::back()->withErrors("用户名和密码不匹配");

    	$user = request(['username','password']);
        $remember = request('checked');
        if($remember !== 1){
            if(\Auth::attempt($user)){
                return redirect('/');
            }else{
                echo "<script>alert('账号或密码错误');location.href='/login'</script>";
            }
            }else{
                if (\Auth::attempt(['username' => $user['username'], 'password' => $user['password']], $remember)) {
                    return redirect('/');
                }
            }
    }

    //qq授权页面
    public function qq(){
        return \Socialite::with('qq')->redirect();
    }

    //qq回调地址
    public function qqCallback(Request $request)
    {
        $code=request('code');
        $access_token=file_get_contents("https://graph.qq.com/oauth2.0/token?grant_type=authorization_code&client_id=101445016&client_secret=ebd13d7be7a43deea19ddcbcefe959d2&code=$code&redirect_uri=www.shops.com/qqCallback");

        $len = strpos($access_token,"&expires_in");

        $access_token=substr($access_token,13,$len-13);

        $str = file_get_contents("https://graph.qq.com/oauth2.0/me?access_token=$access_token");

        $lpos = strpos($str, "(");
        $rpos = strrpos($str, ")");
        $str = substr($str, $lpos+1, $rpos-$lpos-1);
        $user = json_decode($str);
        if(!empty($user)){
            $openid = $user->openid;
            //先去判断当前openid是否绑定用户名
            $userQQ=User::findQq($openid);
            if(isset($userQQ[0]->username)){
                \Auth::login($userQQ[0]);
                self::now();
                return redirect('/');
            }else{
                //跳转到openid和用户名绑定页面
                return view('login/qqbinbing',['openid'=>$openid]);
            }
        }
    }

    //绑定openID和用户名
    public function qqbinbing(Request $request){
        $user = $request->all();
        $username = $user['username'];
        $password = $user['password'];
        $qq_auth = $user['qq_auth'];
        //查询输入的用户名是否存在
        $res=User::findUsername($username);
        if(!isset($res[0]['username'])){
            $qquser = User::create(['username'=>$username,'password'=>$password,'qq_auth'=>$qq_auth]);
            auth()->login($qquser);
            self::now();
        }else{
            $qquser = User::save_qq_auth($username,$qq_auth);
            $userQQ=User::findQq($qq_auth);
            \Auth::login($userQQ[0]);
            self::now();
        }
        return redirect('/');

    }

    //微博授权页面
    public function wb(){
        return \Socialite::with('weibo')->redirect();
    }

    public function wbCallback(Request $request){
        $code = request('code');
        $url = "https://api.weibo.com/oauth2/access_token";
        $post_data = array(
            "client_id" => "901265935",
            "client_secret" => "657fc40e23af670c10b59a7a9ebab11a",
            "grant_type"=>"authorization_code",
            "code"=>$code,
            "redirect_uri"=>"http://www.shops.com/wbCallback");
        //print_r($post_data);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,'https://api.weibo.com/oauth2/access_token');
        //curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        // post数据
        curl_setopt($ch, CURLOPT_POST, 1);
        // post的变量
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
        $output = curl_exec($ch);
        var_dump(curl_error($ch));
        curl_close($ch);
        dd($output);
//        $oauthUser = \Socialite::with('weibo')->user();
//        dd($oauthUser);
    }

    //退出
    public function logout()
    {
        auth()->logout();

        return redirect('/login');
    }

    //获取当前数据
    public static function now(){
         $nowTime = Carbon::now();
         $ip = $_SERVER["REMOTE_ADDR"];
         $user_id = \Auth::id();

        return \DB::table('user')->where('id',$user_id)->update(['last_time'=>$nowTime,'last_ip'=>$ip]);
    }
}
