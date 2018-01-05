@extends('layout.userCommon')
@section('content')
		<div class="m_right">
            <p></p>		
            
			<div class="mem_tit">
            	我的佣金
            </div>
            <table border="1" class="co_tab" style="width:930px; font-size:14px; margin-top:20px;" cellspacing="0" cellpadding="0">
              <tr>
                <td width="35%"><img src="{{asset('images')}}/bag.png" align="absmiddle" /> &nbsp;消费返利</td>                       
                <td width="65%" style="color:#ff4e00;">100R</td>
              </tr>
              <tr>
                <td width="35%"><img src="{{asset('images')}}/bag.png" align="absmiddle" /> &nbsp;预存返还 </td>                       
                <td width="65%" style="color:#ff4e00;">100R</td>
              </tr>
              <tr>
                <td width="35%"><img src="{{asset('images')}}/bag.png" align="absmiddle" /> &nbsp;联盟返利 </td>                       
                <td width="65%" style="color:#ff4e00;">1000R</td>
              </tr>
              <tr>
                <td width="35%"><img src="{{asset('images')}}/bag.png" align="absmiddle" /> &nbsp;可提现余额 </td>                       
                <td width="65%" style="color:#ff4e00;">
                	1200R
                	<span class="tx"><a href="#">提现</a></span>
                </td>
              </tr>
            </table>

            
        </div>
	<!--End 用户中心 End--> 
 @endsection