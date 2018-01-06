@extends('layout.index_head')
@section('content')
<div class="i_bg">  
    <div class="content mar_20">
        <img src="{{asset('images')}}/img1.jpg" />        
    </div>
    <!--Begin 第一步：查看购物车 Begin -->
    <div class="content mar_20">
        <table border="0" class="car_tab" style="width:1200px; margin-bottom:50px;" cellspacing="0" cellpadding="0">
          <tr>
            <td class="car_th" width="150" id='checkbox'><input type="checkbox" name='checkbox' />全/反</td>
            <td class="car_th" width="340">商品名称</td>
            <td class="car_th" width="140">属性</td>
            <td class="car_th" width="150">购买数量</td>
            <td class="car_th" width="130">小计</td>
            <td class="car_th" width="150">操作</td>
          </tr>
          <tbody id='content'>
          <!-- <tr>
            <td>
                <input type="checkbox" class='checkbox' value='3' />
                <input type="hidden" name='num' value='2'>
            </td>
            <td>
                <div class="c_s_img"><img src="{{asset('images')}}/c_1.jpg" width="73" height="73" /></div>
                Rio 锐澳 水蜜桃味白兰地鸡尾酒（预调酒） 275ml
            </td>
            <td align="center">颜色：灰色</td>
            <td align="center">
                <div class="c_num">
                    <input type="button" value="" onclick="jianUpdate1(jq(this));" class="car_btn_1" />
                    <input onkeyup="if(this.value.length==1){this.value=this.value.replace(/[^1-9]/g,'')}else{this.value=this.value.replace(/\D/g,'')}" onafterpaste="if(this.value.length==1){this.value=this.value.replace(/[^1-9]/g,'')}else{this.value=this.value.replace(/\D/g,'')}" type="text" value="1" name="stock" class="car_ipt" />
                    <input type="hidden" value="620" class='hide_money'/>  
                    <input type="button" value="" onclick="addUpdate1(jq(this));" class="car_btn_2" />
                </div>
            </td>
            <td align="center" style="color:#ff4e00;">￥<span class='money'>620.00</span></td>
            <td align="center"><a onclick="ShowDiv('MyDiv','fade')">删除</a>&nbsp; &nbsp;<a href="#">加入收藏</a></td>
          </tr>


          <tr>
            <td>
                <input type="checkbox" class='checkbox' value='3' />
                <input type="hidden" name='num' value='2'>
            </td>
            <td>
                <div class="c_s_img"><img src="{{asset('images')}}/c_1.jpg" width="73" height="73" /></div>
                Rio 锐澳 水蜜桃味白兰地鸡尾酒（预调酒） 275ml
            </td>
            <td align="center">颜色：灰色</td>
            <td align="center">
                <div class="c_num">
                    <input type="button" value="" onclick="jianUpdate1(jq(this));" class="car_btn_1" />
                    <input onkeyup="if(this.value.length==1){this.value=this.value.replace(/[^1-9]/g,'')}else{this.value=this.value.replace(/\D/g,'')}" onafterpaste="if(this.value.length==1){this.value=this.value.replace(/[^1-9]/g,'')}else{this.value=this.value.replace(/\D/g,'')}" type="text" value="1" name="stock" class="car_ipt" />
                    <input type="hidden" value="620" class='hide_money'/>  
                    <input type="button" value="" onclick="addUpdate1(jq(this));" class="car_btn_2" />
                </div>
            </td>
            <td align="center" style="color:#ff4e00;">￥<span class='money'>620.00</span></td>
            <td align="center"><a onclick="ShowDiv('MyDiv','fade')">删除</a>&nbsp; &nbsp;<a href="#">加入收藏</a></td>
          </tr> -->
          <tbody>
          <tr height="70">
            <td colspan="8" style="font-family:'Microsoft YaHei'; border-bottom:0;">
                <label class="r_rad"><input type="checkbox" name="clear" /></label><label class="r_txt">清空购物车</label>
                <span class="fr">商品总价：<b style="font-size:22px; color:#ff4e00;">￥<span id='count_money'>

                </span></b></span>
            </td>
          </tr>
          <tr valign="top" height="150">
            <td colspan="8" align="right">
                <a href="#"><img src="{{asset('images')}}/buy1.gif" /></a>&nbsp; &nbsp; <a href="#"><img src="{{asset('images')}}/buy2.gif" class='settle' /></a>
            </td>
          </tr>
          <input type="hidden" name='user' value="<?= $user_id?>">
        </table>
        
    </div>
    <!--End 第一步：查看购物车 End--> 
    
    
    <!--Begin 弹出层-删除商品 Begin-->
    <div id="fade" class="black_overlay"></div>
    <div id="MyDiv" class="white_content">             
        <div class="white_d">
            <div class="notice_t">
                <span class="fr" style="margin-top:10px; cursor:pointer;" onclick="CloseDiv('MyDiv','fade')"><img src="{{asset('images')}}/close.gif" /></span>
            </div>
            <div class="notice_c">
                
                <table border="0" align="center" style="font-size:16px;" cellspacing="0" cellpadding="0">
                  <tr valign="top">
                    <td>您确定要把该商品移除购物车吗？</td>
                  </tr>
                  <tr height="50" valign="bottom">
                    <td><a href="#" class="b_sure">确定</a><a href="#" class="b_buy">取消</a></td>
                  </tr>
                </table>
                    
            </div>
        </div>
    </div>
    <!--End 弹出层-删除商品 End-->
        

     <!--Begin 弹出层-移除所有商品 Begin-->
    <div id="MyDiv1" class="white_content">             
        <div class="white_d">
            <div class="notice_t">
                <span class="fr" style="margin-top:10px; cursor:pointer;" onclick="CloseDiv('MyDiv1','fade')"><img src="{{asset('images')}}/close.gif" /></span>
            </div>
            <div class="notice_c">
                
                <table border="0" align="center" style="font-size:16px;" cellspacing="0" cellpadding="0">
                  <tr valign="top">
                    <td><span class='gcart'>您确定要把所有商品移除购物车吗？</span></td>
                  </tr>
                  <tr height="50" valign="bottom">
                    <td><a href="javascript:void(0)" id='sure' class="b_sure">确定</a><a href="#" class="b_buy">取消</a></td>
                  </tr>
                </table>
                    
            </div>
        </div>
    </div>
    <!--End 弹出层-删除商品 End-->
    <div id="MyDiv3" class="white_content">             
        <div class="white_d">
            <div class="notice_t">
                <span class="fr" style="margin-top:10px; cursor:pointer;" onclick="CloseDiv('MyDiv3','fade')"><img src="{{asset('images')}}/close.gif" /></span>
            </div>
            <div class="notice_c">
                
                <table border="0" align="center" style="font-size:16px;" cellspacing="0" cellpadding="0">
                  <tr valign="top">
                    <td><span class="b_sure" id='del'>删除成功</span></td>
                  </tr>

                </table>
                    
            </div>
        </div>
    </div>
    <!--Begin 登录 Begin-->
    <!-- <div id="MyDiv2" class="white_content">             
        <div class="white_d">
            <div class="notice_t">
                <span class="fr" style="margin-top:10px; cursor:pointer;" onclick="CloseDiv('MyDiv2','fade')"><img src="{{asset('images')}}/close.gif" /></span>
            </div>
            <div class="notice_c">
                
                <table border="0" align="center" style="font-size:16px;" cellspacing="0" cellpadding="0">
                  <tr valign="top">
                    <td><span class='gcart'>立即登录</span></td>
                  </tr>
                  <tr height="50" width='200'>
                    <td><input type='text' name='username' class="b_buy">:账号</td>
                  </tr>
                  <tr height="50">
                    <td><input type='password' name='password' class="b_buy">:密码</td>
                  </tr>
                  <tr height="50" valign="bottom">
                    <td><input type='submit' value='登录' class="b_sure"></td>
                  </tr>
                </table>
                    
            </div>
        </div>
    </div> -->
@endsection
<script src="{{asset('js')}}/jquery-1.8.2.min.js"></script>
<script>
$(function(){
    //window.localStorage.clear();
    //var cart = window.localStorage.setItem('cart');
    var cart = window.localStorage.getItem('cart');
    //获取用户id
    var userid =$("input[name='user']").val();
    //用户没登录下
    if(userid=='')
    {
        //如果localstrage为空
        if(cart==null)
        {
            return '';
        }
        else
        {
            //将获取的内容进行展示
            var re = '';
            $.each(eval(cart),function(k,v){
                re+="<tr><td><input type='checkbox' class='checkbox' name='fruit' value='"+v.goodsid+"' /><input type='hidden' name='num' value='2'></td><td><div class='c_s_img'><img src='{{asset('images')}}/c_1.jpg' width='73' height='73' /></div>哈哈哈哈哈</td><td align='center'>颜色：灰色</td><td align='center'><div class='c_num'><input type='button' value='' name='jian' class='car_btn_1' /><input type='text' value='"+v.goodsnum+"' name='stock' class='car_ipt' /><input type='hidden' value='88' class='hide_money'/><input type='hidden' value='"+v.goodsid+"' class='goods'><input type='button' value='' name='jia' class='car_btn_2' /></div></td><td align='center' style='color:#ff4e00'>￥<span class='money'>88</span></td><td align='center'><a onclick='ShowDiv('MyDiv','fade')'>删除</a>&nbsp; &nbsp;<a href='#'>加入收藏</a></td></tr>"

            })
            $("#content").html(re)
            common_price();
            //用户没登陆 下的加减
            $(document).on('click',"input[name='jia']",function(){       
                var c = $(this).parent().find(".car_ipt").val();
                if(c>100){
                    c = 100;
                }
                if(c<=1)
                {
                    c=1;
                }
                c=parseInt(c)+1;
                var goodsid = $(this).prev().val();
                var goodsnum = c;
                var data = eval(cart);
                //var st = '';
                $.each(data,function(k,v){
                    if(goodsid==v.goodsid)
                    {
                        v.goodsnum = parseInt(v.goodsnum)+1;
                        //st = 1;
                    }
                })
                // if(st!=1)
                // {
                //     data[data.length]={'goodsid':goodsid,'goodsnum':goodsnum};
                // }
                window.localStorage.setItem('cart',data);
                var money = $(this).parent().find(".hide_money").val();
                
                var count_money = $(this).parents('div').find('#count_money').html();
                count_money = parseFloat(count_money)+parseFloat(money);
                money = money*c;
                $(this).parents('div').find('#count_money').html(count_money+'.00');
                $(this).parents('tr').find('.money').html(money+'.00');
                $(this).parent().find(".car_ipt").val(c);
            })
            
            //没登陆的情况下减
            $(document).on('click',"input[name='jian']",function(){  
                var c = $(this).parent().find(".car_ipt").val();
                if(c==1){    
                    c=1;
                    return false;   
                }else{    
                    c=parseInt(c)-1;    
                    $(this).parent().find(".car_ipt").val(c);
                }
                var goodsid = $(this).prev().val();
                var goodsnum = c;
                var data = eval(cart);
                //var st = '';
                $.each(data,function(k,v){
                    if(goodsid==v.goodsid)
                    {
                        v.goodsnum = parseInt(v.goodsnum)-1;
                        //st = 1;
                    }
                })

                // if(st!=1)
                // {
                //     data[data.length]={'goodsid':goodsid,'goodsnum':goodsnum};
                // }
                window.localStorage.setItem('cart',data);
                var money = $(this).parent().find(".hide_money").val();
                var count_money = $(this).parents('div').find('#count_money').html();
                count_money = parseFloat(count_money)-parseFloat(money);
                money = parseFloat(money)*c;
                $(this).parents('div').find('#count_money').html(count_money+'.00');
                $(this).parents('tr').find('.money').html(money+'.00');
            })

        }

    }
    else //用户登录下
    {
        //发送ajax查询数据库
        Dbcart(userid,'get','cart/dataSel');
        $(document).on('click',"input[name='jia']",function(){       
            var c = $(this).parent().find(".car_ipt").val();
            if(c>100){
                c = 100;
            }
            if(c<=1)
            {
                c=1;
            }
            c=parseInt(c)+1;
            var goodsid = $(this).prev().val();
            var goodsnum = c;
            var money = $(this).parent().find(".hide_money").val();
            
            var count_money = $(this).parents('div').find('#count_money').html();
            count_money = parseFloat(count_money)+parseFloat(money);
            money = money*c;
            $(this).parents('div').find('#count_money').html(count_money+'.00');
            $(this).parents('tr').find('.money').html(money+'.00');
            $(this).parent().find(".car_ipt").val(c);
        })

        $(document).on('click',"input[name='jian']",function(){  
            var c = $(this).parent().find(".car_ipt").val();
            if(c==1){    
                c=1;
                return false;   
            }else{    
                c=parseInt(c)-1;    
                $(this).parent().find(".car_ipt").val(c);
            }
            var money = $(this).parent().find(".hide_money").val();
            var count_money = $(this).parents('div').find('#count_money').html();
            count_money = parseFloat(count_money)-parseFloat(money);
            money = parseFloat(money)*c;
            $(this).parents('div').find('#count_money').html(count_money+'.00');
            $(this).parents('tr').find('.money').html(money+'.00');
        })
    }

    //商品总价
    function common_price()
    {
        var obj = $(".money");
        len = obj.length;
        var ct_money = null;
        for(var i=0;i<len;i++){
            
            ct_money += parseFloat(obj[i].innerText);
        }
        $("#count_money").html(ct_money)
    }
    
    
    

    //全选反选
    $("input[name='checkbox']").click(function(){
        console.log($(this).attr('checked'))
        if($(this).attr('checked')=='checked'){
            $(".checkbox").attr('checked','true')
        }else{
            $(".checkbox").removeAttr('checked')
        }
    })
    

    //清空购物车
    $("input[name='clear']").click(function(){
        if($(this).attr('checked')=='checked')
        {
           ShowDiv('MyDiv1','fade');
        }

    })

    $("#sure").click(function(){
        CloseDiv('MyDiv1','fade')
        //未登录 清空cookie
        if(userid=='')
        {
            sre = window.localStorage.removeItem('cart')
        }
        else    //删除数据库
        { 
            //调用ajax
            Dbcart(userid,'get',"cart");
            ShowDiv('MyDiv3','fade');
            //.show ().delay (3000).fadeOut()
        }
    })


    //库存判断
    $(document).on('blur','input[name="stock"]',function(){
        var val = $(this).val();
        try
        {
            if(val>100)
            {
                throw 100;
            }
            if(val<1)
            {
                throw 1;
            }
            if(val=='')
            {
                throw 1;
            }
        }
        catch(err)
        {
            $(this).val(err);
            val = err;
        }

        var money = $(this).next().val();
        var c_money = parseFloat($(this).parents('td').next().find('.money').html());

        var count_money = parseFloat($("#count_money").html());
        count_money = count_money-c_money;
        money = parseInt(val)*money;
        $(this).parents('td').next().find('.money').html(money);
        $("#count_money").html(count_money+money);
        
    })

    //加减正则过滤
    $(document).on('keyup',"input[name='stock']",function(){
        if(($(this).val()).length==1)
        {
            $(this).val(($(this).val()).replace(/[^1-9]/g,''))
        }
        else
        {
            $(this).val(($(this).val()).replace(/\D/g,''))
        }
        
    })
    $(document).on('afterpaste',"input[name='stock']",function(){
        if(($(this).val()).length==1)
        {
            $(this).val(($(this).val()).replace(/[^1-9]/g,''))
        }
        else
        {
            $(this).val(($(this).val()).replace(/\D/g,''))
        }
        
    })
     

    //结算
    $(".settle").click(function(){
        //获取cookie
        if(cart!=null)
        {
            ShowDiv('MyDiv2','fade')
        }
        else
        {

            var fruit='[{';
            //遍历
            $("input:checkbox[name='fruit']:checked").each(function() {

                //判断cookie中是否有该商品

                fruit+= "'goods_id':"+$(this).val()+",'goods_num':"+$(this).next().val()+"";
            });
            fruit+=']}';
        }
        alert(fruit)
        
        
        //window.localStorage.setItem('cart',fruit);//存储数据
        //alert(window.localStorage.getItem('xqy1'));//读取数据
        //window.localStorage.removeItem('xqy');//删除数据项
        //window.localStorage.clear();//删除所有数据 
        //alert(fruit)
    })

   
    //封装获取数据库中用户存放的商品
    function Dbcart(userid='',type,url)
    {
        _this = $(this);
        //发送ajax
        $.ajax({
            type:type,
            url:'http://localhost/six/bearDoctor/public/'+url,
            data:{
                userid:userid,
                //_token:"{{csrf_token()}}",
            },
            success:function(msg)
            {
                //Database all remove
                if(url=='cart')
                {
                    if(msg=='ok')
                    {
                        $("#del").html("删除成功")
                    }
                    else
                    {
                         $("#del").html("删除失败")
                    }
                }

                //Database select
                if(url=='cart/dataSel')
                {
                    var result=eval(msg);
                    console.log(result)
                    var str = '';
                    $.each(result,function(k,v){
                        str+="<tr><td><input type='checkbox' class='checkbox' name='fruit' value='"+v.goods_id+"' /><input type='hidden' name='num' value='2'></td><td><div class='c_s_img'><img src='{{asset('images')}}/c_1.jpg' width='73' height='73' /></div>"+v.name+"</td><td align='center'>颜色：灰色</td><td align='center'><div class='c_num'><input type='button' value='' name='jian' class='car_btn_1' /><input type='text' value='"+v.num+"' name='stock' class='car_ipt' /><input type='hidden' value='"+v.sell_price+"' class='hide_money'/><input type='hidden' value='"+v.goods_id+"' class='goods'><input type='button' value='' name='jia' class='car_btn_2' /></div></td><td align='center' style='color:#ff4e00'>￥<span class='money'>"+v.sell_price+"</span></td><td align='center'><a onclick='ShowDiv('MyDiv','fade')'>删除</a>&nbsp; &nbsp;<a href='#'>加入收藏</a></td></tr>"
                    });
                    $("#content").html(str)
                    common_price();
                }
                
            }
        })         
    }

})
</script>
