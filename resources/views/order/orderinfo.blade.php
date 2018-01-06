@extends('layout.index_head')
@section('content')

<style>
  .jia{
    border:0;
    display: none;
  }
  .jian{
    border: 0;
   display: none;
  }
</style>
<!--End Menu End--> 
<div class="i_bg">  
    <div class="content mar_20">
        <img src="{{asset('images')}}/img2.jpg" />        
    </div>
    
    <!--Begin 第二步：确认订单信息 Begin -->
    <div class="content mar_20">
        <div class="two_bg">
            <div class="two_t">
                <span class="fr"><a href="#" id="sp_update">修改</a></span>商品列表
            </div>
            <table border="0" class="car_tab" style="width:1110px;" cellspacing="0" cellpadding="0">
              <tr>
                <td class="car_th" width="550">商品名称</td>
                <td class="car_th" width="140">属性</td>
                <td class="car_th" width="150">购买数量</td>
                <td class="car_th" width="130">小计</td>
              </tr>
              <?php foreach($goods_list as $v){?>

              <tr cart_id="<?=$v['id']?>">
                <td>
                    <div class="c_s_img"><img src="{{asset('upload')}}/<?=$v['cover']?>" width="73" height="73" /></div>
                    <span style="margin-left:160px"><?=$v['goods']?></span>
                </td>
                <td align="center"><?=$v['attr']?></td>
                <td align="center"><button class="jian">-</button><span class="num"><?=$v['num']?></span><button  class="jia">+</button></td>
                <td align="center" style="color:#ff4e00;">￥<span class="Sprice"><?=$v['price']?></span></td>
           
              </tr>
              <?php }?>
              <tr>
                <td colspan="5" align="right" style="font-family:'Microsoft YaHei';">
                   总计<span class="znum"></span>元
                </td>
              </tr>
            </table>
            <script type="text/javascript" src="{{asset('js')}}/jquery-1.8.2.min.js"></script>
            <script>
            $(function(){
               znum();
               var user_id=<?=$man['user_id']?>;
             
               function znum(){
                var Sprice = 0;
               var price=$('.Sprice')
               for(var i=0 ; i<price.length ; i++){
                Sprice += parseInt(document.getElementsByClassName("Sprice")[i].innerHTML)
               }
               $('.znum').html(Sprice)
               }
               
                $("#sp_update").toggle(function(){
                  $(".jia").show();
                  $(".jian").show();
                },function(){
                  $(".jia").hide();
                  $(".jian").hide();

                });

                $(".jia").click(function(){
                   var num=parseInt($(this).prev().html());
                   var res=num+1;
                   $(this).prev().html(res);
                   var price=parseInt($(this).parent().next().children().html());
                   var dan_price=price/num;

                   $(this).parent().next().children().html(res*dan_price);
                   znum();
                  
                    var prop= $(".jslct").val();
                    var zunms=$(".znum").html();
                     $(".z_num").html(zunms);
                    if(prop<zunms){
                      $(".jslct").removeAttr("disabled"); 
                    }

                })
                $(".jian").click(function(){
                  var obj=$(this);
                 var cart_id=$(this).parents("tr").attr("cart_id");
                   var num=parseInt($(this).next().html());
                   var res=num-1;
                   if(res<1){
                    var r=window.confirm("您确定要删除选中商品吗")
                    if(r==true){
                       $.get("{{url('delCart')}}", {
                    "user_id": user_id,
                    "cart_id":cart_id
                }, function (data) {
                    if (data.error== 0) {

                     obj.parent().parent().remove();

                    } else {
                        alert('删除失败');
                        res=1;
                    }
                },"json")
                     
                     }else{
                      res=1;
                     }
                   
                   }
                   $(this).next().html(res);
                   var price=parseInt($(this).parent().next().children().html());
                   var dan_price=price/num;

                   $(this).parent().next().children().html(res*dan_price);
                   znum();
                    $(".z_num").html($(".znum").html());
                })
                    prop= $(".jslct").val();
                    zunms=$(".znum").html();
                  
                  $(".z_num").html($(".znum").html());
                $(".jslct").change(function(){
                   
                   alert(zunms)
                 $(".z_num").html(zunms-prop);
                })
                                 
            })
            </script>
            <div class="two_t">
                <span class="fr"><a href="#" id="add_update">修改</a></span>收货人信息
            </div>
            <table border="0" class="peo_tab" style="width:1110px;" cellspacing="0" cellpadding="0">
              <tr>
                <td class="p_td" width="160">收货人</td>
                <td width="395"><?=$man['man']?></td>
                <td class="p_td" width="160">收货地址</td>
                <td width="395"><?=$man['address']?></td>
              </tr>
              <tr>
                <td class="p_td">详细地址</td>
                <td><?=$man['amply']?></td>
                <td class="p_td">邮政编码</td>
                <td><?=$man['postcode']?></td>
              </tr>
             
              <tr>
                <td class="p_td">标志建筑</td>
                <td><?=$man['bulid']?></td>
                <td class="p_td">联系电话</td>
                <td><?=$man['phone']?></td>
              </tr>
            </table>
                        
            <div class="two_t">
                其他信息
            </div>
            <table border="0" class="car_tab" style="width:1110px;" cellspacing="0" cellpadding="0">
              <tr>
                <td width="145" align="right" style="padding-right:0;"><b style="font-size:14px;">使用红包：</b></td>
                <td>
                    <span class="fl" style="margin-left:50px; margin-right:10px;">选择已有红包</span>
                    <select class="jslct"  name="city" id="prop_">
                      <option value="0">请选择</option>
                     <?php foreach ($user_prop as $key => $v) {?>
                   
                       <option value="<?=$v['price']?>"><?=$v['price']?>(<?=$v['prop_name']?>)</option>
                     <?php }?>
                    
                    </select>
                    <span class="fl" style="margin-left:50px; margin-right:10px;">或者输入红包序列号</span>
                    <span class="fl"><input type="text" value="" class="c_ipt" style="width:220px;" />
                    <span class="fr" style="margin-left:10px;"><input type="submit" value="验证红包" class="btn_tj" /></span>
                </td>
              </tr>
              <tr valign="top">
                <td align="right" style="padding-right:0;"><b style="font-size:14px;">订单附言：</b></td>
                <td style="padding-left:0;"><textarea class="add_txt" style="width:860px; height:50px;" name="postscript"></textarea></td>
              </tr>
              <tr>
                <td align="right" style="padding-right:0;"><b style="font-size:14px;">缺货处理：</b></td>
                <td>
                    <label class="r_rad"><input type="checkbox" name="none" checked="checked" /></label><label class="r_txt" style="margin-right:50px;">等待所有商品备齐后再发</label>
                    <label class="r_rad"><input type="checkbox" name="none" /></label><label class="r_txt" style="margin-right:50px;">取下订单</label>
                    <label class="r_rad"><input type="checkbox" name="none" /></label><label class="r_txt" style="margin-right:50px;">与店主协商</label>
                </td>
              </tr>
            </table>

            <table border="0" style="width:900px; margin-top:20px;" cellspacing="0" cellpadding="0">
              <tr>
                <td align="right">
                    该订单完成后，您将获得 <font color="#ff4e00">1815</font> 积分 ，以及价值 <font color="#ff4e00">￥0.00</font> 的红包 <br />
                    商品总价: <span class="znum" font color="#ff4e00"></font>
                </td>
              </tr>
              <tr height="70">
                <td align="right">
                    <b style="font-size:14px;">应付款金额：￥<span style="font-size:22px; color:#ff4e00;" class="z_num"></span></b>
                </td>
              </tr>
              <tr height="70">
                <td align="right"><a href="#"><img src="{{asset('images')}}/btn_sure.gif" /></a></td>
              </tr>
            </table>

            
        </div>
    </div>
    <!--End 第二步：确认订单信息 End-->
@endsection