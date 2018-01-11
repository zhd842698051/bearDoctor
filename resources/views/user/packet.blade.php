@extends('layout.userCommon')
@section('content')
		<div class="m_right">
            <p></p>			
            <div class="mem_tit">我的红包</div>
			<table border="0" class="order_tab" style="width:930px; text-align:center; margin-bottom:30px;" cellspacing="0" cellpadding="0">
              <tr>                                                                                                                                                    
                <td width="155">红包名称</td>
                <td width="155">红包金额</td>
                <td width="155">活动开始时间</td>
                <td width="155">活动结束时间</td>
                <td width="155">红包类型</td>
                <td width="155">红包状态</td>
              </tr>
              @foreach($data as $k=>$v)
              <tr>
                <td>{{ $v->name }}</td>
                <td>{{ $v->price }}</td>
                <td> {{ $v->start_time }}</td>
                <td>{{ $v->end_time }}</td>
                @if($v->type == 0)
                  <td>优惠券</td>
                @else
                  <td>红包</td>
                @endif
                @if($v->status == 0)
                <td>未使用</td>
                @else
                <td>已使用</td>
                  @endif
              </tr>
                @endforeach
			</table>

	<!--End 用户中心 End--> 
 @endsection