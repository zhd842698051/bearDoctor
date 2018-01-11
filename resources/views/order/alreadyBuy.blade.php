@extends('layout.userCommon')
@section('content')
    <div class="m_right">
        <p></p>
        <div class="mem_tit">已购买的商品</div>
        <table border="0" class="order_tab" style="width:930px; text-align:center; margin-bottom:30px;" cellspacing="0" cellpadding="0">
            <tr>
                <td width="10%">订单号</td>
                <td width="15%">商品名称</td>
                <td width="10%">订单类型</td>
                <td width="10%">是否使用道具</td>
                <td width="10%">实付金额</td>
                <td width="15%">操作</td>
            </tr>
            @foreach($order as $k=>$v)
            <tr>
                <td><font color="#ff4e00">{{ $v->order_no }}</font></td>
                <td>{{ $v->name }}</td>
                @if($v->type == 0)
                    <td>普通订单</td>
                @elseif($v->type == 1)
                    <td>团购订单</td>
                @else
                    <td>限时抢购</td>
                @endif
                @if($v->is_prop == 0)
                    <td>否</td>
                @else
                    <td>是</td>
                @endif
                <td>￥{{ $v->order_money }}</td>
                <td><a href="{{ URL('/order') }}/save_goods_status?id={{ $v->order_id }}"><font color="#ff4e00">删除订单</font></a></td>
            </tr>
                @endforeach
        </table>



    </div>
    <!--End 用户中心 End-->
@endsection
