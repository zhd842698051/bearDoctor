@extends('layout.userCommon')
@section('content')
		<div class="m_right">
            <p></p>		
            
			<div class="mem_tit">
            	我的会员<span class="m_num">共 588人</span>
            </div>
            <ul class="members">
            	<li>
                	<div class="nums">（106）</div>
                    <div class="m_type"><a href="Member_Member_List.html">一级会员</a></div>
                </li>
                <li>
                	<div class="nums">（86）</div>
                    <div class="m_type"><a href="#">二级会员</a></div>
                </li>
                <li>
                	<div class="nums">（106）</div>
                    <div class="m_type"><a href="#">三级会员</a></div>
                </li>
                <li>
                	<div class="nums">（106）</div>
                    <div class="m_type"><a href="#">四级会员</a></div>
                </li>
                <li>
                	<div class="nums">（106）</div>
                    <div class="m_type"><a href="#">五级会员</a></div>
                </li>
            </ul>
     
        </div>
	<!--End 用户中心 End--> 
   @endsection