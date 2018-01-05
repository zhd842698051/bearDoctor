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
            });
        </script>
        <!--End Banner End-->

        <div class="content mar_10">
            <!--Begin 特卖 Begin-->
            <div class="s_left">
                <div class="brand_t">品牌特卖</div>
                <ul class="sell_brand">
                    <li>
                        @foreach($data as $brand)
                        <div class="con">
                            <div class="simg"><img src="{{asset('upload')}}/{{$brand->logo}}" width="160" height="140" /></div>
                            <div class="ch_bg">
                                <span class="ch_txt">先领券再消费</span>
                                <a href="{{url('brand/coupon')}}" class="ch_a">查看</a>
                            </div>
                                <!-- {{$brand->created_at}}-{{$brand->update_at}} -->
                               09月12日 — 10月20日
                        </div>
                         <div class="img"><img src="{{asset('upload')}}/{{$brand->logo}}" width="530" height="190" /></div>
                        @endforeach
                       
                    </li>
                </ul>

                <div class="brand_t">商品特卖</div>
                <ul class="p_sell">
                    @foreach($data as $goods)
                    <li>
                        <div class="img"><img src="{{asset('upload')}}/{{$goods->logo}}" width="160" height="140" /></div>
                        <div class="name">{{$goods->name}}</div>
                        <div class="price">
                            <table border="0" style="width:100%; color:#888888;" cellspacing="0" cellpadding="0">
                                <tr style="font-family:'宋体';">
                                    <td width="33%">市场价 </td>
                                    <td width="33%">折扣</td>
                                    <td width="33%">为您节省</td>
                                </tr>
                                <tr>
                                    <td style="text-decoration:line-through;">{{$goods->sell_price}}</td>
                                    <td>8.0</td>
                                    <td>￥100</td>
                                </tr>
                            </table>
                        </div>
                      
                        <div class="ch_bg" id="gold_div">
                            <span class="ch_txt">￥<font>{{$goods->sale_price}}</font></span>
                            <a href="#" class="ch_a" id="gold_btn" onclick="seckill();">立即抢购</a>
                        </div>
                        
                       <script type="text/javascript" src="{{asset('js')}}/jquery-1.8.2.min.js"></script>
                        <!-- <div class="times">倒计时：1200 时 30 分 28 秒</div> -->
                        <script type="text/javascript">
                                                               
                            //总时间，以分为单位
                            var time = 100;
                            //小时
                            var h = parseInt(time / 60) > 0 ? parseInt(time / 60) : 0;
                            //分
                            var m = time % 60;
                            //秒
                            var s = 60;
                            //输出到当前Script的Dom位置
                            document.write('<div class="times">距离开抢，还剩余<font id="f_hh">' + h + '</font>小时<font id="f_mm">' + m + '</font>分<font id="f_ss">' + s + '</font>秒</div>');
                            //开始执行倒计时
                            var timeInterval = setInterval(function () {
                                //如果时、分、秒都为0时将停止当前的倒计时
                                if (h == 0 && m == 0 && s == 0) { clearInterval(timeInterval); return; }
                                //当秒走到0时，再次为60秒
                                if (s == 0) { s = 60; }
                                if (s == 60) {
                                    //每次当秒走到60秒时，分钟减一
                                    m -= 1;
                                    //当分等于0时并且小时还多余1个小时的时候进里面看看
                                    if (m == 0 && h > 0) {
                                        //小时减一
                                        h -= 1;
                                        //分钟自动默认为60分
                                        m = 60;
                                        //秒自动默认为60秒
                                        s = 60;
                                    }
                                }
                                //秒继续跳动，减一
                                s -= 1;
                                //小时赋值
                                document.getElementById('f_hh').innerHTML = h;
                                //分钟赋值
                                document.getElementById('f_mm').innerHTML = m;
                                //秒赋值
                                document.getElementById('f_ss').innerHTML = s;
                            }, 1000);

                        </script>

                    </li>
                        @endforeach
                </ul>
            </div>
            <!--End 特卖 End-->
   

    <script type="text/javascript">
        //       $(function(){
        //         $(".ch_a").click(function(){
        //          var time=$(this).parent().next().next().next().children().children().val(); 
        //           alert(time);die;
        //           $.ajax({
        //           url: "http://www.beardoctor.com/seckill/show",
        //           type: "get",
        //          data: {time: time},
        //          success: function (time){
        //             alert(time);
        //         },
        //         })
  
        //   })
        // })
    </script>


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

