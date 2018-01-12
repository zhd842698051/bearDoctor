@extends('layout.index_head')
@section('content')
<!--End Menu End--> 
<style>
    #alipay{
   width:120px;
   height:60px; 
   margin-right:30px;
  
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

        $("#wechatpay").click(function(){
          location.href="{{url('wechatpay')}}";
        })
        //秒数转化为时间戳
        var sec_to_time = function(s) {
        var t;
        if(s > -1){
            var hour = Math.floor(s/3600);
            var min = Math.floor(s/60) % 60;
            var sec = s % 60;
            if(hour < 10) {
                t = '0'+ hour + ":";
            } else {
                t = hour + ":";
            }

            if(min < 10){t += "0";}
            t += min + ":";
            if(sec < 10){t += "0";}
            t += sec.toFixed(2);
        }
        return t;
      }
        var count=parseInt($("#coun").val());
        var tmp = Date.parse( new Date() ).toString();
        tmp = tmp.substr(0,10);
        var ctime=sec_to_time(count-tmp).substr(3,5);
        var oid=$("#oid").val();
       
          var second=ctime.substr(3,2);
          var minute=ctime.substr(0,2);
          
         setInterval(function(){
           second--;
           if(second == 00 && minute == 00) {
            $.get("{{url('saveOrder')}}", {
            "order_id":oid
          }, function (data) {
              if (data.error== 0) {
                alert('订单已自动为您取消！');
                window.history.back();

              } else {
                  alert('error');
              
              }
                },"json")
        };if(second ==(-01)) {
           second = 59;
           minute--;
          if(minute < 10) minute = "0" + minute;
       };
       if(second < 10) second = "0" + second;

           $("#btn").html(minute+':'+second);
          },1000);
      

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
              <input type="hidden" value="<?=$data['count_time']?>" id="coun">
              <input type="hidden" value="<?=$data['id']?>" id="oid">
              <tr height="35">
                 <td style="font-size:18px;">
                 请尽快下单，订单将在<span id="btn" style='color:red'><?=date("i:s",($data['count_time']-time()))?></span>后自动取消
                </td>
                 
              </tr>
              <tr>
                <td style="font-size:14px; font-family:'宋体'; padding:10px 0 20px 0; border-bottom:1px solid #b6b6b6;">
                  您的应付款金额为: <font color="#ff4e00"><?=$data['real_money']?></font>元
                </td>
              </tr>
              <tr>
                <td style="font-size:14px; font-family:'宋体'; padding:10px 0 20px 0; border-bottom:1px solid #b6b6b6;">

                   请选择支付方式:
                   <form action="{{url('alipay')}}" method="post">
                    <input type="hidden" value="<?=$data['order_no']?>" name="order_no">
                    <input type="hidden" value="<?=$data['real_money']?>" name="money">
                    <input type="hidden" value="<?=$data['goods']?>" name="goods">
                                 <input type="hidden" name="_token" value="{{csrf_token()}}">
                     <button type="submit" style="border:0;background-color:white; cursor: pointer;"><img src="{{asset('upload/image')}}/alipay_50.png" id="alipay" /></button></form>
                     <img src="{{asset('upload/image')}}/timg.jpg" id="wechatpay"/> 
                </td>
              </tr>
               
              
            </table>          
        </div>
      
    </div>
  <!--End 第三步：提交订单 End--> 
    
    
  @endsection