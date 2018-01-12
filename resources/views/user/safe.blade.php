@extends('layout.userCommon')
@section('content')
		<div class="m_right">
            <p></p>
            <div class="mem_tit">密码修改</div>
            {{--<div class="m_des">--}}
                {{--<form>--}}
                {{--<table border="0" style="width:880px;"  cellspacing="0" cellpadding="0">--}}
                  {{--<tr height="45">--}}
                    {{--<td width="80" align="right">原手机 &nbsp; &nbsp;</td>--}}
                    {{--<td><input type="text" value="" class="add_ipt" style="width:180px;" />&nbsp; <font color="#ff4e00">*</font></td>--}}
                  {{--</tr>--}}
                  {{--<tr height="45">--}}
                    {{--<td align="right">新手机 &nbsp; &nbsp;</td>--}}
                    {{--<td><input type="text" value="" class="add_ipt" style="width:180px;" />&nbsp; <font color="#ff4e00">*</font></td>--}}
                  {{--</tr>--}}
                  {{--<tr height="50">--}}
                    {{--<td>&nbsp;</td>--}}
                    {{--<td><input type="submit" value="确认修改" class="btn_tj" /></td>--}}
                  {{--</tr>--}}
                {{--</table>--}}
                {{--</form>--}}
            {{--</div>--}}
            
            {{--<div class="m_des">--}}
                {{--<form>--}}
                {{--<table border="0" style="width:880px;"  cellspacing="0" cellpadding="0">--}}
                  {{--<tr height="45">--}}
                    {{--<td width="80" align="right">原邮箱 &nbsp; &nbsp;</td>--}}
                    {{--<td><input type="text" value="" name="email" class="add_ipt" style="width:180px;" />&nbsp; <font color="#ff4e00">*</font></td>--}}
                  {{--</tr>--}}
                  {{--<tr height="45">--}}
                    {{--<td align="right">新邮箱 &nbsp; &nbsp;</td>--}}
                    {{--<td><input type="text" value="" name="new_email" class="add_ipt" style="width:180px;" />&nbsp; <font color="#ff4e00">*</font></td>--}}
                  {{--</tr>--}}
                  {{--<tr height="50">--}}
                    {{--<td>&nbsp;</td>--}}
                    {{--<td><input type="submit" value="确认修改" class="btn_tj" /></td>--}}
                  {{--</tr>--}}
                {{--</table>--}}
                {{--</form>--}}
            {{--</div>--}}
            
            <div class="m_des">
                <form action=" {{ URL('/user/save_password') }} " method="post">
                    {{csrf_field()}}
                <table border="0" style="width:880px;"  cellspacing="0" cellpadding="0">
                  <tr height="45">
                    <td width="80" align="right">原密码 &nbsp; &nbsp;</td>
                    <td><input type="text" value="" name="password" class="add_ipt" style="width:180px;" />&nbsp; <font color="#ff4e00" id="password">*</font></td>
                  </tr>
                  <tr height="45">
                    <td align="right">新密码 &nbsp; &nbsp;</td>
                    <td><input type="text" value="" name="new_password" class="add_ipt" style="width:180px;" />&nbsp; <font color="#ff4e00"  id="new_password">*</font></td>
                  </tr>
                  <tr height="45">
                    <td align="right">确认密码 &nbsp; &nbsp;</td>
                    <td><input type="text" value="" name="new_password1" class="add_ipt" style="width:180px;" />&nbsp; <font color="#ff4e00"  id="new_password1">*</font></td>
                  </tr>
                  <tr height="50">
                    <td>&nbsp;</td>
                    <td><input type="submit" value="确认修改" id="submit" class="btn_tj" /></td>
                  </tr>
                </table>
                </form>
            </div>
        
        </div>
	<!--End 用户中心 End-->
<script src="{{ asset('js/app.js') }}"></script>
<script>
    $(function(){
        $("input[name='password']").blur(function(){
            var password = $("input[name='password']").val();
            if(password == ""){
                $("#password").html('<span id="span_password" style="font-size:12px; color:red">原始密码不能为空</span>')
                $("#span_password").next().remove();
                return false;
            }else{
                $.get("{{ URL('/checkPassword') }}",{
                    password:password,
                },function(res){
                    if(res == true){
                        $("#password").html('<span id="span_password" style="font-size:12px; color:green">√</span>')
                        $("#span_password").next().remove();
                        return false;
                    }else{
                        $("#password").html('<span id="span_password" style="font-size:12px; color:red">原始密码错误</span>')
                        $("#span_password").next().remove();
                        return false;
                    }
                },"json")
            }
        })

        $("input[name='new_password']").blur(function(){
            var new_password = $("input[name='new_password']").val();
            var password = $("input[name='password']").val();
            var reg = /^[a-zA-Z]\w{5,17}$/
            if(new_password == ""){
                $("#new_password").html('<span id="span_new_password" style="font-size:12px; color:red">新密码不能为空</span>')
                $("#span_new_password").next().remove();
                return false;
            }else if(!reg.test(new_password)){
                $("#new_password").html('<span id="span_new_password" style="font-size:12px; color:red">不能为纯数字</span>');
                $("#span_new_password").next().remove();
                return false;
            }else if(new_password == password){
                $("#new_password").html('<span id="span_new_password" style="font-size:12px; color:red">新密码和旧密码不能相同</span>')
                $("#span_new_password").next().remove();
                return false;
            }else{
                $("#new_password").html('<span id="span_new_password" style="font-size:12px; color:green">√</span>')
                $("#span_new_password").next().remove();
                return false;
            }
        })

        $("input[name='new_password1']").blur(function(){
            var new_password1 = $("input[name='new_password1']").val();
            var new_password = $("input[name='new_password']").val();
            if(new_password == ""){
                $("#new_password1").html('<span id="span_new_password1" style="font-size:12px; color:red">确认密码不能为空</span>')
                $("#span_new_password1").next().remove();
                return false;
            }else if(new_password !== new_password1){
                $("#new_password1").html('<span id="span_new_password1" style="font-size:12px; color:red">两次密码不一致</span>');
                $("#span_new_password1").next().remove();
                return false;
            }else{
                $("#new_password1").html('<span id="span_new_password1" style="font-size:12px; color:green">√</span>')
                $("#span_new_password1").next().remove();
                return false;
            }
        })

        $("#submit").click(function(){
            var reg = /^[a-zA-Z1-9]\w{5,17}$/
            var password = $("input[name='password']").val();
            var new_password = $("input[name='new_password']").val();
            var new_password1 = $("input[name='new_password1']").val();
            if(password == ""){
                $("#password").html('<span id="span_password" style="font-size:12px; color:red">原始密码不能为空</span>')
                $("#span_password").next().remove();
                return false;
            }else if(new_password == ""){
                $("#new_password").html('<span id="span_new_password" style="font-size:12px; color:red">新密码不能为空</span>')
                $("#span_new_password").next().remove();
                return false;
            }else if(new_password1 == ""){
                $("#new_password1").html('<span id="span_new_password1" style="font-size:12px; color:red">确认密码不能为空</span>')
                $("#span_new_password1").next().remove();
                return false;
            }else if(!reg.test(new_password)){
                $("#new_password").html('<span id="span_new_password1" style="font-size:12px; color:red">不能为纯数字</span>')
                $("#span_new_password").next().remove();
                return false;
            }else if(password == new_password1){
                $("#new_password").html('<span id="span_new_password" style="font-size:12px; color:red">新密码和旧密码不能相同</span>')
                $("#span_new_password").next().remove();
                return false;
            }else if(new_password !== new_password1){
                $("#new_password1").html('<span id="span_new_password1" style="font-size:12px; color:red">两次密码不一致</span>');
                $("#span_new_password1").next().remove();
                return false;
            }else{
                return true;
            }
        })
    })
</script>
@endsection

