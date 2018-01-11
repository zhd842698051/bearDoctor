@extends('layout.index_head')
@section('content')
<!--End Menu End--> 
<style>
    #alipay{
   width:120px;
   height:60px; 
   margin-right:30px;
   cursor: pointer;
}
    #wechatpay{
    width:120px;
    height:70px;
    cursor:pointer; 
}
</style>
<meta name="csrf-token" content="{{ csrf_token() }}" />
<script>
    $(function(){
       $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });

        $("#alipay").click(function(){

            location.href="{{url('alipay')}}";
        })

        $("#wechatpay").click(function(){
          location.href="{{url('wechatpay')}}";
        })
    })
</script>
<div class="i_bg">  
    <div class="content mar_20">
    	<img src="images/img3.jpg" />        
    </div>
    
    <!--Begin 第三步：提交订单 Begin -->
    <div class="content mar_20">
    	
        <!--Begin 银行卡支付 Begin -->
    	<div class="warning">        	
            <table border="0" style="width:1000px; text-align:center;" cellspacing="0" cellpadding="0">
              <tr height="35">
                <td style="font-size:18px;">
                	感谢您在本店购物！您的订单已提交成功，请记住您的订单号: <font color="#ff4e00"><?=$data['order_no']?></font>
                </td>
              </tr>
              <tr>
                <td style="font-size:14px; font-family:'宋体'; padding:10px 0 20px 0; border-bottom:1px solid #b6b6b6;">
                	您的应付款金额为: <font color="#ff4e00"><?=$data['real_money']?></font>
                </td>
              </tr>
              <tr>
                <td style="font-size:14px; font-family:'宋体'; padding:10px 0 20px 0; border-bottom:1px solid #b6b6b6;">

                   请选择支付方式:
                   <form action="{{url('alipay')}}" method="post">
                    <input type="hidden" value="<?=$data['order_no']?>" name="order_no">
                    <input type="hidden" value="<?=$data['real_money']?>" name="money">
                                 <input type="hidden" name="_token" value="{{csrf_token()}}">
                     <img src="{{asset('upload/image')}}/alipay_50.png" id="alipay" /><input type="submit" value="alipay"></form>
                     <img src="{{asset('upload/image')}}/timg.jpg" id="wechatpay"/> 
                </td>
              </tr>
               
              
            </table>        	
        </div>
      
    </div>
	<!--End 第三步：提交订单 End--> 
    
    
  @endsection