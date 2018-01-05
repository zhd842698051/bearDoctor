@extends('layout.userCommon')
@section('content')
		<div class="m_right">
            <p></p>
            <div class="mem_tit">分成明细</div>
           	<p style="padding:0 40px; margin:0 auto 20px auto;">
            	本网店为鼓励推荐新用户注册，现开展 <b>推荐订单分</b> 成活动，活动流程如下： <br /><br />

                １、在浏览商品时，点击推荐此商品，获得推荐代码，将其发送到论坛、博客上。<br />
                ２、访问者点击链接，访问网店。<br />
                ３、在访问者点击链接的 <b>24小时</b> @内，若该访问者在本站有订单，即认定该订单是您推荐的。<br />
                ４、您将获得该订单金额的 <b>5%</b> 、积分的 <b>7%</b> 的奖励。<br />
                ５、提成由管理员人工审核发放，请您耐心等待。<br />
                ６、您可以通过分成明细来查看您的介绍、分成情况。<br />
            </p>
			
            <div class="mem_tit">分成明细</div>
			<table border="0" class="order_tab" style="width:930px; text-align:center; margin-bottom:30px;" cellspacing="0" cellpadding="0">
              <tr>                                                                                                                                                    
                <td width="20%">订单号</td>                                                                                                                                 
                <td width="20%">现金分成</td>
                <td width="20%">积分分成</td>
                <td width="20%">分成模式</td>
                <td width="20%">分成状态</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
			</table>
            
			<div class="mem_tit">代码</div>
			<table border="0" class="order_tab" style="width:930px; margin-bottom:30px;" cellspacing="0" cellpadding="0">
              <tr>                                                                                                                                                    
                <td width="30%" style="color:#ff4e00; text-indent:20px;">尤洪商城</td>                                                                                                                                 
                <td width="70%"><input type="text" value="<a href='http://fx.028dgg.net/?u=76' target='_blank'>DGG商城</a>" class="code_ipt" /> 网页签名代码</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
			</table>
           
        </div>
	<!--End 用户中心 End--> 
@endsection