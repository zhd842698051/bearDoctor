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
                        <div class="con">
                            <div class="simg"><img src="{{asset('images')}}/sb1.jpg" width="220" height="100" /></div>
                            <div class="ch_bg">
                                <span class="ch_txt">先领券再消费</span>
                                <a href="#" class="ch_a">查看</a>
                            </div>
                            09月12日 — 10月20日
                        </div>
                        <div class="img"><img src="{{asset('images')}}/tm1.jpg" width="530" height="190" /></div>
                    </li>
                    <li>
                        <div class="con">
                            <div class="simg"><img src="{{asset('images')}}/sb2.jpg" width="220" height="100" /></div>
                            <div class="ch_bg">
                                <span class="ch_txt">先领券再消费</span>
                                <a href="#" class="ch_a">查看</a>
                            </div>
                            09月12日 — 10月20日
                        </div>
                        <div class="img"><img src="{{asset('images')}}/tm2.jpg" width="530" height="190" /></div>
                    </li>
                    <li>
                        <div class="con">
                            <div class="simg"><img src="{{asset('images')}}/sb3.jpg" width="220" height="100" /></div>
                            <div class="ch_bg">
                                <span class="ch_txt">先领券再消费</span>
                                <a href="#" class="ch_a">查看</a>
                            </div>
                            09月12日 — 10月20日
                        </div>
                        <div class="img"><img src="{{asset('images')}}/tm3.jpg" width="530" height="190" /></div>
                    </li>
                </ul>

                <div class="brand_t" >商品特卖</div> 
                <!-- <div id="nowTime">当前时间:</div> -->
                <ul class="p_sell">
                   <?php foreach($data as $k=>$v) {?>
                   
                        <!-- <input type="hidden" id="timed" value="<?php echo $v['created_at']?>"> -->
                    <li>
                        <div class="img"><img src="config('app.image')+xDTRT0fEm5dtskBbAP9bTLUkGcNA2niNBNgWDHFR.jpeg" width="150px" height="100px"/></div>
                        <div class="name"><?php echo $v['name']?></div>
                        <div class="price">
                            <table border="0" style="width:100%; color:#888888;" cellspacing="0" cellpadding="0">
                                <tr style="font-family:'宋体';">
                                    <td width="33%">市场价 </td>
                                    <td width="33%">折扣</td>
                                    <td width="33%">为您节省</td>
                                </tr>
                                <tr>
                                    <td style="text-decoration:line-through;"><?php echo $v['sell_price']?></td>
                                    <td>8.0</td>
                                    <td>￥100</td>
                                </tr>
                            </table>
                        </div>

                        <div class="ch_bg" id="gold_div">
                           <span class="ch_txt" id="ch_txt">￥<font><?php echo $v['seckill_price']?></font></span>
                            <!-- <input type="hidden" id="time_color" value="<?php echo $v['seckill_price']?>"> -->

                            <a href="#" class="ch_a" id="gold_btn" onclick="seckill();">立即抢购</a>

                        </div>


                         <div class="times" id="showStartTime_<?php echo $v['id']?>"></div>
                         <input type="hidden" id="showtimekill_<?php echo $v['id']?>" value="3600">

                         <script type="text/javascript">
                          setInterval("set_time("+<?php echo $v['id']?>+")",1000);
                             
                         </script>
                    
                    </li>
                        <?php } ?>
                    
                </ul>
            </div>
            <!--End 特卖 End-->
        <script type="text/javascript" src="{{asset('js')}}/jquery-1.8.2.min.js"></script>
            <!-- 比较开场时间与结束时间 -->
           <!--  <script type="text/javascript">
                // 数据库时间
                $timed=$("#timed").attr("value");
                
                var time_end = new Date($timed).getTime(); 
                // alert(time_end)
                // 本地
                $nowTime=$("#nowTime").attr("value");
                // alert($nowTime);

            </script> -->
            <!-- 字体颜色变色 -->
            <script type="text/javascript">
               $time_color=$("#time_color").attr("value");
               // alert($time_color);
               
            </script>

        <!-- 倒计时 -->
        <script type="text/javascript">
               
             function set_time($id){

                    var data=parseInt($("#showtimekill_"+$id).val());
                    // console.log(data)
                    var day=Math.floor(data/3600/24)<10?'0'+Math.floor(data/3600/24):Math.floor(data/3600/24);
                    var hours=Math.floor(data/3600%24)<10?'0'+Math.floor(data/3600%24):Math.floor(data/3600%24);
                    var minutes=Math.floor(data%3600/60)<10?'0'+Math.floor(data%3600/60):Math.floor(data%3600/60);
                    var seconds=(data%60)<10?'0'+(data%60):(data%60);
                    $("#showStartTime_"+$id).html("距离开抢："+day+"天"+hours+"时"+minutes+"分"+seconds+"秒");
                    data--;
                    $("#showtimekill_"+$id).val(data);

                }
        </script>

      <!-- 当前时间 -->
      <!--  <script type="text/javascript">
          function current(){
           
          var d=new Date(),str='';
           str +=d.getFullYear()+'-';
          //获取当前年份
           str +=d.getMonth()+1+'-';
            //获取当前月份（0——11）
           str +=d.getDate()+' '; 
            str +=d.getHours()+':';
             str +=d.getMinutes()+':';
          str +=d.getSeconds()+'';
           return str;
            } 
            setInterval(function(){
                 $("#nowTime").html(current())
             var ttime = new Date($("#nowTime").html()).getTime();
             
            },1000); 
        </script>
      -->

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

