@extends('layout.userCommon')
@section('content')
		<div class="m_right">
            <p></p>		
            
			<table border="0" class="ma_tab" style="width:930px; margin-top:50px;" cellspacing="0" cellpadding="0">
              <tr>
                <td align="right" width="130" style="padding-right:30px;">您的充值金额为</td>                                                                       
                <td>￥ 999.00</td>
              </tr>
              <tr>
                <td align="right" style="padding-right:30px;">您选择的支付方式为</td>
                <td>支付宝</td>
              </tr>
              <tr>
                <td align="right" style="padding-right:30px;">支付手续费用为</td>
                <td>￥ 0.00</td>
              </tr>
              <tr valign="top">
                <td align="right" style="padding-right:30px;">支付方式描述</td>
                <td>
                	支付宝网站(www.alipay.com) 是国内先进的网上支付平台。<br />
                    支付宝收款接口：在线即可开通，<font color="#ff4e00">零预付，免年费，</font>单笔阶梯费率，无流量限制。<br />
                    <a href="#" style="color:#ff4e00;">立即在线申请</a>
                </td>
              </tr>
			</table>
            
            <p align="center">
            	<input type="submit" value="立即使用支付宝支付" class="btn_tj" />
            </p>
          
        </div>
	<!--End 用户中心 End--> 
@endsection