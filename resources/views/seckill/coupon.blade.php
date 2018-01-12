@extends('layout.index_head')
@section('content')
    <div class="i_bg">
        <!--Begin Banner Begin-->
        <div class="n_ban">
            <div class="top_slide_wrap">
                <ul class="slide_box bxslider">
                    <li><a href="#" style="background:url({{asset('images')}}/n_ban.jpg) no-repeat center top;">banner1</a></li>
                    <li><a href="#" style="background:url({{asset('images')}}/n_ban.jpg) no-repeat center top;">banner2</a></li>
                    <li><a href="#" style="background:url({{asset('images')}}/n_ban.jpg) no-repeat center top;">banner3</a></li>
                </ul>
                <div class="op_btns clearfix">
                    <a href="#" class="op_btn op_prev"><span></span></a>
                    <a href="#" class="op_btn op_next"><span></span></a>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            //var jq = jQuery.noConflict();
            (function(){
                $(".bxslider").bxSlider({
                    auto:true,
                    prevSelector:jq(".top_slide_wrap .op_prev")[0],nextSelector:jq(".top_slide_wrap .op_next")[0]
                });
            })();
        </script>
        <!--End Banner End-->

        <div class="content mar_10">
            <!--Begin 特卖 Begin-->
            <div class="brand_t">商品特卖</div>
            <ul class="p_sell">
                <?php foreach($data as $k=>$v) {?>
                <li>
                    <input type="hidden" id="ids" value="<?php echo $v['id']?>">
                    <div class="img"><img src="{{asset('images')}}/t1.jpg" width="160" height="140" /></div>
                    <div class="name"><?php echo $v['name']?></div>
                    <div class="price">
                        <table border="0" style="width:100%; color:red; font-size:15px" cellspacing="0" cellpadding="0">
                            <div style="font-family:'宋体'">
                                <td>满<?php echo $v['full']?>可用</td>
                                <td width="33%">剩余<?php echo $v['num']?>张</td>
                            </div>
                        </table>
                    </div>
                    <div class="ch_bg">
                        <span class="ch_txt">￥<font><?php echo $v['price']?></font></span>
                        <a href="javascript:;" id="take" class="ch_a">立即领取</a>
                    </div>
                        <div class="times" id="showStartTime_<?php echo $v['id']?>"></div>
                        <input type="hidden" id="showtimekill_<?php echo $v['id']?>" value="<?php echo $v['start_time']?>">
                        <script type="text/javascript">
                        setInterval("set_time("+<?php echo $v['id']?>+")",1000);
                        </script>
                </li>
                <?php }?>
            </ul>
        </div>
            <!--End 特卖 End-->
            <script type="text/javascript" src="{{asset('js')}}/jquery-1.8.2.min.js"></script>
            <script type="text/javascript">
                $(function(){
                    var id=$("#ids").val();
                    $(".ch_a").click(function(){
                        $.get("{{url('seckill/coupon')}}",{
                            "id":id
                        },function(msg){
                            if(msg.error==0){

                            }else{
                                alert("已经领完了");
                            }
                        },"json");
                    })
                })
            </script>

            <script type="text/javascript">
                   function set_time($id){
                    var data=parseInt($("#showtimekill_"+$id).val());
                    // alert(data)
                    if(0<data && data<3600){
                         var day=Math.floor(data/3600/24)<10?'0'+Math.floor(data/3600/24):Math.floor(data/3600/24);
                        var hours=Math.floor(data/3600%24)<10?'0'+Math.floor(data/3600%24):Math.floor(data/3600%24);
                        var minutes=Math.floor(data%3600/60)<10?'0'+Math.floor(data%3600/60):Math.floor(data%3600/60);
                        var seconds=(data%60)<10?'0'+(data%60):(data%60);
                        $("#showStartTime_"+$id).html("领券倒计时："+day+"天"+hours+"时"+minutes+"分"+seconds+"秒");
                        data--;
                        $("#showtimekill_"+$id).val(data);
                    }else if(data>3600){
                        var day=Math.floor(data/3600/24)<10?'0'+Math.floor(data/3600/24):Math.floor(data/3600/24);
                        var hours=Math.floor(data/3600%24)<10?'0'+Math.floor(data/3600%24):Math.floor(data/3600%24);
                        var minutes=Math.floor(data%3600/60)<10?'0'+Math.floor(data%3600/60):Math.floor(data%3600/60);
                        var seconds=(data%60)<10?'0'+(data%60):(data%60);
                        $("#showStartTime_"+$id).html("活动未开始");
                        data--;
                        $("#showtimekill_"+$id).val();
                     }else if(data<0){
                         var day=Math.floor(data/3600/24)<10?'0'+Math.floor(data/3600/24):Math.floor(data/3600/24);
                        var hours=Math.floor(data/3600%24)<10?'0'+Math.floor(data/3600%24):Math.floor(data/3600%24);
                        var minutes=Math.floor(data%3600/60)<10?'0'+Math.floor(data%3600/60):Math.floor(data%3600/60);
                        var seconds=(data%60)<10?'0'+(data%60):(data%60);
                        $("#showStartTime_"+$id).html("活动已结束");
                        data--;
                        $("#showtimekill_"+$id).val();
                     }
                 }
            </script>
            <div class="s_right">
                <div class="sell_ban">
                    <div id="imgPlays">
                        <ul class="imgs" id="actors">
                            <li><a href="#"><img src="{{asset('images')}}/tm_ban.jpg" width="300" height="352" /></a></li>
                            <li><a href="#"><img src="{{asset('images')}}/tm_ban.jpg" width="300" height="352" /></a></li>
                            <li><a href="#"><img src="{{asset('images')}}/tm_ban.jpg" width="300" height="352" /></a></li>
                        </ul>
                        <div class="prev_s">上一张</div>
                        <div class="next_s">下一张</div>
                    </div>
                </div>
                <div class="sell_hot">
                    <div class="s_hot_t">
                        <span class="fl">热销品牌</span>
                        <span class="h_more fr"><a href="#">更多</a></span>
                    </div>
                    <ul>
                        <li><a href="#"><img src="{{asset('images')}}/hb_1.jpg" width="160" height="59" /></a></li>
                        <li><a href="#"><img src="{{asset('images')}}/hb_2.jpg" width="160" height="59" /></a></li>
                        <li><a href="#"><img src="{{asset('images')}}/hb_3.jpg" width="160" height="59" /></a></li>
                        <li><a href="#"><img src="{{asset('images')}}/hb_4.jpg" width="160" height="59" /></a></li>
                        <li><a href="#"><img src="{{asset('images')}}/hb_5.jpg" width="160" height="59" /></a></li>
                        <li><a href="#"><img src="{{asset('images')}}/hb_6.jpg" width="160" height="59" /></a></li>
                        <li><a href="#"><img src="{{asset('images')}}/hb_7.jpg" width="160" height="59" /></a></li>
                        <li><a href="#"><img src="{{asset('images')}}/hb_8.jpg" width="160" height="59" /></a></li>
                        <li><a href="#"><img src="{{asset('images')}}/hb_9.jpg" width="160" height="59" /></a></li>
                        <li><a href="#"><img src="{{asset('images')}}/hb_10.jpg" width="160" height="59" /></a></li>
                        <li><a href="#"><img src="{{asset('images')}}/hb_11.jpg" width="160" height="59" /></a></li>
                        <li><a href="#"><img src="{{asset('images')}}/hb_12.jpg" width="160" height="59" /></a></li>
                    </ul>
                </div>
                <div class="sell_tel">
                    <table border="0" style="width:280px; margin:15px auto;" cellspacing="0" cellpadding="0">
                        <tr valign="top">
                            <td width="170"><img src="{{asset('images')}}/tm_1.png" /></td>
                            <td>
                                客服在线时间 <br />
                                每天09:00 - 18:00
                            </td>
                        </tr>
                        <tr valign="top">
                            <td colspan="2" style="padding-left:58px; padding-top:10px;">
                                <span style="color:#ff4e00; font-size:20px;">400-123-4567</span><br />
                                客服热线（免费长途）
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="sell_tel">
                    <table border="0" style="width:280px; margin:15px auto;" cellspacing="0" cellpadding="0">
                        <tr valign="top">
                            <td width="170"><img src="{{asset('images')}}/tm_2.png" /></td>
                            <td>
                                享受VIP专属特权
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="sell_tel">
                    <table border="0" style="width:280px; margin:15px auto;" cellspacing="0" cellpadding="0">
                        <tr valign="top">
                            <td width="170"><img src="{{asset('images')}}/tm_3.png" /></td>
                            <td>
                                客服在线时间<br />
                                每天09:00 - 18:00
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection