@extends('layout.userCommon')
@section('content')
		<div class="m_right">
            <p></p>
            <div class="mem_tit">收货地址</div>
			<div class="address">
            	<div class="a_close"><a href="#"><img src="{{asset('images')}}/a_close.png" /></a></div>
                <table border="0" class="add_tab" style="width:930px;"  cellspacing="0" cellpadding="0">
                    <tr>
                        <td width="50" align="right"><center><b>收货人</b></center></td>
                        <td width="80" align="right"><center><b>所在地区</b></center></td>
                        <td width="80" align="right"><center><b>详细地址</b></center></td>
                        <td width="50" align="right"><center><b>邮编</b></center></td>
                        <td width="80" align="right"><center><b>电话号码</b></center></td>
                        <td width="80" align="right"><center><b>操作</b></center></td>
                    </tr>
                    <tr>
                        <td><center>李鑫</center></td>
                        <td><center>山西省长治市襄垣县</center></td>
                        <td><center>山西省长治市襄垣县</center></td>
                        <td><center>046200</center></td>
                        <td><center>18710002972</center></td>
                        <td>
                            <center><a href="">修改</a> | <a href="">删除</a></center>
                        </td>
                    </tr>

                </table>

                <p align="right">
                	<a href="#" style="color:#ff4e00;">设为默认</a>&nbsp; &nbsp; &nbsp; &nbsp; <a href="#" style="color:#ff4e00;">编辑</a>&nbsp; &nbsp; &nbsp; &nbsp;
                </p>

      </div>

      <div class="mem_tit">
      	<a href="#"><img src="{{asset('images')}}/add_ad.gif" /></a>
      </div>
      <form action="{{URL('/user/address/add')}}" method="post">
          {{csrf_field()}}
      <table border="0" class="add_tab" style="width:930px;"  cellspacing="0" cellpadding="0">
        <tr>
          <td width="135" align="right">配送地区</td>
           <td colspan="3" style="font-family:'宋体';">
          	<select name="country" style="background-color:#f6f6f6;">
                <option value="" selected="selected">请选择...</option>
                <option value="1">中国</option>
              </select>
          	<select name="province" style="background-color:#f6f6f6;">
                <option value="" selected="selected">请选择...</option>
              </select>
              <select name="city" style="background-color:#f6f6f6;">
                  <option value="" selected="selected">请选择...</option>
              </select>
              <select name="area" style="background-color:#f6f6f6;">
                <option value="" selected="selected">请选择...</option>
              </select>
              （必填）
          </td>
        </tr>
        <tr>
          <td align="right">收货人姓名</td>
          <td style="font-family:'宋体';"><input type="text" value="" name="name" class="add_ipt" />（必填）</td>
          <td align="right">电子邮箱</td>
          <td style="font-family:'宋体';"><input type="text" value="" name="email" class="add_ipt" />（必填）</td>
        </tr>
        <tr>
          <td align="right">详细地址</td>
          <td style="font-family:'宋体';"><input type="text" value="" name="amply" class="add_ipt" />（必填）</td>
          <td align="right">邮政编码</td>
          <td style="font-family:'宋体';"><input type="text" value="" name="postcode" class="add_ipt" /></td>
        </tr>
        <tr>
          <td align="right">手机</td>
          <td style="font-family:'宋体';"><input type="text" value="" name="phone" class="add_ipt" />（必填）</td>
            <td align="right">标志建筑</td>
            <td style="font-family:'宋体';"><input type="text" value="" name="bulid" class="add_ipt" /></td>
        </tr>
        <tr>

        </tr>
      </table>
     	<p align="right">
            <input type="submit" value="确认添加" style="margin-right:110px; background:orange; border:none" >
        </p>
      </form>
  </div>
    </div>
<script type="text/javascript" src="{{asset('js')}}/app.js"></script>
<script>
    window.onload=function(){
        //省
            $(document).on("change","select[name='country']",function(){
						var country = $(this).val();
                        var this_ = $(this)
                        $.get("{{URL('user/address/country')}}",{
                            'pid':country,
                        },function(data){
                            var str = '';
                        $.each(data,function(k,v){
                            str+='<option value="'+v.region_id+'">'+v.region_name+'</option>';
                        })
                            this_.parent().find("select[name='province']").html(str)
                    },"json")
				})

        //市
        $(document).on("change","select[name='province']",function(){
            var country = $(this).val();
            var this_ = $(this)
            $.get("{{URL('user/address/country')}}",{
                'pid':country,
            },function(data){
                var str = '';
                $.each(data,function(k,v){
                    str+='<option value="'+v.region_id+'">'+v.region_name+'</option>';
                })
                this_.parent().find("select[name='city']").html(str)
            },"json")
        })

        //县
        $(document).on("change","select[name='city']",function(){
            var country = $(this).val();
            var this_ = $(this)
            $.get("{{URL('user/address/country')}}",{
                'pid':country,
            },function(data){
                var str = '';
                $.each(data,function(k,v){
                    str+='<option value="'+v.region_id+'">'+v.region_name+'</option>';
                })
                this_.parent().find("select[name='area']").html(str)
            },"json")
        })
    }
</script>
@endsection
