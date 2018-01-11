@extends('layout.userCommon')
@section('content')
	<div class="m_right">
        <p></p>
        <div class="mem_tit">
                <span class="fr" style="font-size:12px; color:red; font-family:'宋体'; margin-top:5px;">共发现{{$num}}件</span>我的收藏
        </div>
       	<table border="0" class="order_tab" style="width:930px;" cellspacing="0" cellpadding="0">
          <tr>                                                                                                                                       
            <td align="center" width="420">商品名称</td>
            <td align="center" width="180">价格</td>
            <td align="center" width="270">操作</td>
          </tr>
          @foreach($collect as $k=>$v)
          <tr>
            <td style="font-family:'宋体';">
            	<div align="center">{{ $v->name }}
            </td>
            <td align="center">￥{{ $v->sell_price }}</td>
            <td align="center">&nbsp; &nbsp; <a href="#" style="color:#ff4e00;">加入购物车</a>&nbsp; &nbsp; <a href="{{ URL('user/collect') }}/{{$v->id}}/del">删除</a></td>
          </tr>
            @endforeach
        </table>        
    </div>
	<!--End 用户中心 End--> 
@endsection
