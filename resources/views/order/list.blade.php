@extends('layout.userCommon')
@section('content')
		<div class="m_right">
            <p></p>
            <div class="mem_tit">我的订单</div>
            <table border="0" class="order_tab" style="width:930px; text-align:center; margin-bottom:30px;" cellspacing="0" cellpadding="0">
              <tr>
                <td width="20%">订单号</td>
                <td width="25%">下单时间</td>
                <td width="15%">订单总金额</td>
                <td width="25%">订单状态</td>
                <td width="15%">操作</td>
              </tr>
              @foreach($order as $k=>$v)
              <tr>
                <td><font color="#ff4e00">{{ $v->order_no }}</font></td>
                <td>{{ $v->created_at }}</td>
                <td>{{ $v->order_money }}</td>
                @if($v->status == 0 )
                  <td>订单过期</td>
                @elseif($v->status == 1 )
                  <td>待支付</td>
                @elseif($v->status == 2 )
                  <td>已支付</td>
                @elseif($v->status == 3 )
                  <td>已完成</td>
                @else
                  <td>退款</td>
                @endif
                <td><a href="{{ URL('/order') }}/save_order_status?id={{ $v->id }}"><font color="#ff4e00">删除订单</font></a></td>
              </tr>
                @endforeach
            </table>
          <link rel="stylesheet" href="{{ asset('css') }}/page.css">
          <div id="pull_right">
            <div class="pull-right">
              {!! $order->render() !!}
            </div>
          </div>
        </div>
	<!--End 用户中心 End-->
@endsection
