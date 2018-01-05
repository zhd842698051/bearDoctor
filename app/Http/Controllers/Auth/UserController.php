<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\IndexController;
use Illuminate\Http\Request;
use App\Region;
use App\Address;

class UserController extends Controller
{
	//用户
	public function index()
	{
		$user=$this->status();
		return view('user/index',compact('user',$user));
	}

	//地址
	public function address()
	{
		$user=$this->status();
		return view('user/address',compact('user',$user));
	}

	//四级联动  国家
	public function country()
	{
		$pid=request('pid');
		$region=new Region;
		$province=$region->country($pid)->toArray();
		echo json_encode($province);
	}

	//收货地址添加
	public function add(Request $request)
	{
		$data=$request->all();
		$region = new Region;
		$country=$region->city($data['country'])->toArray();
		$provice=$region->city($data['province'])->toArray();
		$city=$region->city($data['city'])->toArray();
		$area=$region->city($data['area'])->toArray();
		$city = $country[0]['region_name'].$provice[0]['region_name'].$city[0]['region_name'].$area[0]['region_name'];
		$data['user_id']=Auth::id();

		$data['address']=$city;
		//dd($data);
		$res = Address::create(['name'=>$data['name'],'email'=>$data['email'],'amply'=>$data['amply'],'postcode'=>$data['postcode'],'phone'=>$data['phone'],'address'=>$data['address'],'user_id'=>$data['user_id'],'bulid'=>$data['bulid']]);

		if($res){
			return redirect('user/address');
		}

	}

	//申请提现
	public function cash()
	{
		$user=$this->status();
		return view('user/cash',compact('user',$user));
	}

	//我的收藏
	public function collect()
	{
		$user=$this->status();
		return view('user/collect',compact('user',$user));
	}

	//我的佣金
	public function commission()
	{
		$user=$this->status();
		return view('user/commission',compact('user',$user));
	}

	//推广链接
	public function links()
	{
		$user=$this->status();
		return view('user/links',compact('user',$user));
	}

	//我的会员
	public function member()
	{
		$user=$this->status();
		return view('user/member',compact('user',$user));
	}

	//会员列表
	public function memberList()
	{
		$user=$this->status();
		return view('user/memberList',compact('user',$user));
	}

	//申请余额记录
	public function memberMoney()
	{
		$user=$this->status();
		return view('user/memberMoney',compact('user',$user));
	}

	//充值
	public function memberCharge()
	{
		$user=$this->status();
		return view('user/memberCharge',compact('user',$user));
	}

	//支付
	public function moneyPay()
	{
		$user=$this->status();
		return view('user/moneyPay',compact('user',$user));
	}

	//我的留言
	public function message()
	{
		$user=$this->status();
		return view('user/message',compact('user',$user));
	}

	//我的红包
	public function packet()
	{
		$user=$this->status();
		return view('user/packet',compact('user',$user));
	}

	//我的业绩
	public function results()
	{
		$user=$this->status();
		return view('user/results',compact('user',$user));
	}

	//账户安全
	public function safe()
	{
		$user=$this->status();
		return view('user/safe',compact('user',$user));
	}

	//公用的header用户名 和登录状态
	public function status(){
		$status=IndexController::isLogin();
		if($status == false){
			return redirect('/login');
		}else{
			$user=Auth::user();
			$user->isLogin = $status;
			return $user;
		}
	}
}
