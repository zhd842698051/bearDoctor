@extends('layout.userCommon')
@section('content')
		<div class="m_right">
            <p></p>		
            
			<div class="mem_tit">
            	申请提现
            </div>
            <table border="0" class="mem_tab" style="width:930px; margin-bottom:30px;" cellspacing="0" cellpadding="0">
              <tr>
              	<td class="ma_a" colspan="2" style="padding:12px 50px;">
                	<span class="fl" style="color:#ff4e00; font-size:14px;">会员余额：<b>￥ 1000元</b></span>
                    <span class="fr"><a href="#">账户明细</a>|<a href="#">提现记录</a></span>        
                </td>
              </tr>
              <tr>                                                                                                                                                    
                <td width="150" class="tx_l">提现金额</td>                                                                                                                                         
                <td width="680"><input type="text" value="提取金额" class="tx_ipt" /></td>
              </tr>
              <tr>
                <td class="tx_l">真实姓名</td>
                <td><input type="text" value="姓名填写" class="tx_ipt" /></td>
              </tr>
              <tr>
                <td class="tx_l">开户行</td>
                <td><input type="text" value="填写银行名称" class="tx_ipt" /></td>
              </tr>
              <tr>
                <td class="tx_l">银行账号</td>
                <td><input type="text" value="填写银行账号" class="tx_ipt" /></td>
              </tr>
              <tr>
                <td class="tx_l">手机号</td>
                <td><input type="text" value="手机号码" class="tx_ipt" /></td>
              </tr>
              <tr valign="top">
                <td class="tx_l">备注</td>
                <td><textarea class="tx_txt">会员备注</textarea></td>
              </tr>
              <tr height="70">
                <td colspan="2" align="center">
                	<input type="submit" value="提交表单" class="btn_tj" /> &nbsp; &nbsp; <input type="reset" value="重置表单" class="btn_tj" />
                </td>
              </tr>
			</table>
        </div>
	<!--End 用户中心 End--> 
 @endsection