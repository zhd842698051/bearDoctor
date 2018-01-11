@extends('layout.login')
@section('content')
    <div class="log_c">
        <form method="post" action="{{URL('/login/wblogin')}}">
            {{csrf_field()}}
            <table border="0" style="width:370px; font-size:14px; margin-top:30px;" cellspacing="0" cellpadding="0">
                <tr height="50" valign="top">
                    <td width="55">&nbsp;</td>
                    <td>
                        <span class="fl" style="font-size:24px;">绑定用户名</span>
                        <span class="fr">还没有商城账号，<a href="{{ URL('/register') }}" style="color:#ff4e00;">立即注册</a></span>
                    </td>
                </tr>
                <tr height="70">
                    <td>用户名</td>
                    <input type="hidden" name="sina_auth" value="{{ $openid }}">
                    <td><input type="text" value="" name="username" class="l_user" style="width: 230px;" /></td>
                </tr>
                <tr height="70">
                    <td>密&nbsp; &nbsp; 码</td>
                    <td><input type="password" value="" name="password" class="l_pwd" style="width: 230px;" /></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td style="font-size:12px; padding-top:20px;">
                </tr>
                <tr height="60">
                    <td>&nbsp;</td>

                    <td><input type="submit" value="立即绑定" class="log_btn" id="submit" /></td>
                </tr>
            </table>
        </form>
    </div>
@endsection

<script type="text/javascript" src="{{asset('js')}}/app.js"></script>

<script>
    $(function(){

        $("input[name='username']").blur(function(){
            var username = $("input[name='username']").val();
            if(username == ""){
                $("input[name='username']").after('<span id="span_username" style="font-size:12px; color:red">用户名不能为空</span>');
                $("#span_username").next().remove();
                return false;
            }else{
                $("input[name='username']").next().remove();
            }
        })

        $("input[name='password']").blur(function(){
            var password = $("input[name='password']").val();
            if(password == ""){
                $("input[name='password']").after('<span id="span_password" style="font-size:12px; color:red">密码不能为空</span>');
                $("#span_password").next().remove();
                return false;
            }else{
                $("input[name='password']").next().remove();
            }
        })

        $("#submit").click(function(){
            var username = $("input[name='username']").val();
            var password = $("input[name='password']").val();
            if(username==""){
                $("input[name='username']").after('<span id="span_username" style="font-size:12px; color:red">用户名不能为空</span>');
                $("#span_username").next().remove();
                return false;
            }else{
                $("input[name='username']").after('<span id="span_username" style="font-size:12px; color:red"></span>')
            }

            if(password == ""){
                $("input[name='password']").after('<span id="span_password" style="font-size:12px; color:red">密码不能为空</span>');
                $("#span_password").next().remove();
                return false;
            }else{
                $("input[name='password']").after('<span id="span_password" style="font-size:12px; color:red"></span>');
            }
        })

        //记住登录信息按钮
        $("#checkbox").click(function(){
            var checkbox = $(this).val();
            if(checkbox==1){
                $("#checkbox").val(1)
            }
            //alert($(this).val())
        })
    })
</script>
