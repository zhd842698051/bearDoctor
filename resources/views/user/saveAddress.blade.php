@extends('layout.userCommon')
@section('content')
		<div class="m_right">
            <p></p>

    	<h1><center style="color:red; font-family:'宋体';">修改地址</center></h1>
      <form action="{{ URL('/user/address/update') }}" method="post" style="padding-top:10px">
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
					<input type="hidden" name="id" value="{{ $address['id'] }}">
          <td align="right">收货人姓名</td>
          <td style="font-family:'宋体';"><input type="text" value="{{ $address['name'] }}" name="name" class="add_ipt" />（必填）</td>
            <td align="right">手机</td>
            <td style="font-family:'宋体';"><input type="text" value="{{ $address['phone'] }}" name="phone" class="add_ipt" />（必填）</td>
        </tr>
        <tr>
          <td align="right">详细地址</td>
          <td style="font-family:'宋体';"><input type="text" value="{{ $address['amply'] }}" name="amply" class="add_ipt" />（必填）</td>
          <td align="right">邮政编码</td>
          <td style="font-family:'宋体';"><input type="text" value="{{ $address['postcode'] }}" name="postcode" class="add_ipt" /></td>
        </tr>
        <tr>
            <td align="right">标志建筑</td>
            <td style="font-family:'宋体';"><input type="text" value="{{ $address['bulid'] }}" name="bulid" class="add_ipt" /></td>
            <td align="right"></td>
            <td style="font-family:'宋体';"></td>
        </tr>
        <tr>

        </tr>
      </table>
     	<p align="right">
            <input type="submit" value="确认修改" style="margin-right:110px; background:orange; border:none" >
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

				//删除收货地址
				$(".addressDel").click(function(){
					var con=confirm("您确定要删除吗?")
					if(con==true){
							var addressId = $(this).parents("center").prev().val();
							alert(addressId);
							$.get("{{ URL('/user/address/del') }}",{
									'addressId':addressId,
							},function(data){
										if(data.error==0){
												location.href="{{ URL('user/address') }}"
										}else{
												alert("删除失败");
										}
							},"json")
					}else {
							return false;
					}
				})

				//编辑收货地址
				// $(".save").click(function(){
				// 		var addressId = $(this).parents("center").prev("input[name='addressId']").val();
				// 		$.get("{{ URL('user/address/find') }}",{
				// 				'addressId':addressId,
				// 		},function(data){
        //
				// 		},"json")
				// })
    }
</script>
@endsection
