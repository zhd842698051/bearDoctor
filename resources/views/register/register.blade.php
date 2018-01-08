@extends('layout.login')
@section('content')
<div class="reg_c">
  <form action="{{URL('/register')}}" method="post">
    {{csrf_field()}}
    <table border="0" style="width:560px; font-size:14px; margin-top:20px;" cellspacing="0" cellpadding="0">
      <tr height="50" valign="top">
        <td width="95">&nbsp;</td>
        <td>
          <span class="fl" style="font-size:24px;">注册</span>
            <p style="padding-right: 140px;"><span class="fr">已有商城账号，<a href="{{ URL('/login') }}" style="color:#ff4e00;">我要登录</a></span>
        </td></p>
      </tr>
      <tr height="50">
        <td align="right"><font color="#ff4e00">*</font>&nbsp;用户名 &nbsp;</td>
        <td><input type="text" value="" name="username" class="l_user" /></td>
      </tr>
      <tr height="50">
        <td align="right"><font color="#ff4e00">*</font>&nbsp;密码 &nbsp;</td>
        <td><input type="password" value="" name="password" class="l_pwd" /></td>
      </tr>
      <tr height="50">
        <td align="right"><font color="#ff4e00">*</font>&nbsp;确认密码 &nbsp;</td>
        <td><input type="password" value="" name="password1" class="l_pwd" /></td>
      </tr>
      <tr height="50">
        <td align="right"><font color="#ff4e00">*</font>&nbsp;邮箱 &nbsp;</td>
        <td><input type="text" value="" name="email" class="l_email" /></td>
      </tr>
      <tr height="50">
        <td align="right"><font color="#ff4e00">*</font>&nbsp;手机 &nbsp;</td>
        <td><input type="text" value="" name="phone" class="l_tel" /></td>
      </tr>
      <!-- <tr height="50">
        <td align="right">邀请人会员名 &nbsp;</td>
        <td><input type="text" value="" class="l_mem" /></td>
      </tr>
      <tr height="50">
        <td align="right">邀请人ID号 &nbsp;</td>
        <td><input type="text" value="" class="l_num" /></td>
      </tr> -->
      <tr height="50">
        <td align="right"> <font color="#ff4e00">*</font>&nbsp;验证码 &nbsp;</td>
        <td>
            <input type="text" value="" name="captcha" class="l_ipt" />
            <a href="javascript:;" style="font-size:12px; font-family:'宋体';" id="change">看不清,换一张</a>
        </td>
      </tr>

      <tr height="50">
          <td align="right"></td>
        <td>
            <img src="{{ captcha_src() }}" alt="验证码" id="captcha" style="padding-top: 20px;">
        </td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td style="font-size:12px; padding-top:20px;">
          <span style="font-family:'宋体';" class="fl">
              <label class="r_rad"><input type="checkbox" checked="checked" id="checked" value="" /></label><label class="r_txt">我已阅读并接受《用户协议》</label>
            </span>
        </td>
      </tr>
      <tr height="60">
        <td>&nbsp;</td>
        <td><input type="submit" value="立即注册" class="log_btn" id="submit" /></td>
      </tr>
    </table>
    </form>
  </div>
@endsection
<script type="text/javascript" src="{{asset('js')}}/app.js"></script>

<script>
  //点击切换验证码
    $(function(){
        $("#change").click(function(){
              $("#captcha").attr('src',"{{URL('/')}}/captcha/default?"+Math.random())
        })


        //验证用户名规则
      $("input[name='username']").blur(function(){
            var username = $(this).val()
            var reg = /^[a-zA-Z]\w{5,17}$/
            if(username == ""){
                $("input[name='username']").after('<span id="span_username" style="font-size:12px; color:red">用户名不能为空</span>');
                $("#span_username").next().remove();
                return false;
            }else if(!reg.test(username)){
                $("input[name='username']").after('<span id="span_username" style="font-size:12px; color:red">必须以由字母开头6-16位之间</span>');
                $("#span_username").next().remove();
                return false;
            }else if(username !== ""){
                $.get("{{ URL('/checkUsername') }}",{
                    'username':username
                },function(res){
                    if(res.error==0){
                        $("input[name='username']").after('<span id="span_username" style="font-size:12px; color:red">用户名已存在</span>');
                        $("#span_username").next().remove();
                        return false;
                    }else{
                        $("input[name='username']").after('<span id="span_username" style="font-size:12px; color:green">√</span>')
                        $("#span_username").next().remove();
                        return false;
                    }
                },"json");
            }else{
                $("input[name='username']").after('<span id="span_username" style="font-size:12px; color:green">√</span>')
                $("#span_username").next().remove();
                return false;
            }
      })

      //验证密码规则
      $("input[name='password']").blur(function(){
            var password = $(this).val();
            var reg = /^\w{5,17}$/
            if(password == ""){
                $("input[name='password']").after('<span id="span_password" style="font-size:12px; color:red">密码不能为空</span>');
                $("#span_password").next().remove();
                return false;
            }else if(!reg.test(password)){
                 $("input[name='password']").after('<span id="span_password" style="font-size:12px; color:red">由数字字母下划线组成6-16位之间</span>');
                $("#span_password").next().remove();
                return false;
            }else{
                $("input[name='password']").after('<span id="span_password" style="font-size:12px; color:green">√</span>')
                $("#span_password").next().remove();
                return false;
            }
      })

      //验证确认密码
      $("input[name='password1']").blur(function(){
            var password = $("input[name='password']").val()
            var password1 = $(this).val();
            if(password1 == ""){
                $("input[name='password1']").after('<span id="span_password1" style="font-size:12px; color:red">确认密码不能为空</span>');
                $("#span_password1").next().remove();
                return false;
            }else if(password1 !== password){
                $("input[name='password1']").after('<span id="span_password1" style="font-size:12px; color:red">两次密码不一致</span>');
                $("#span_password1").next().remove();
                return false;
            }else{
                $("input[name='password1']").after('<span id="span_password1" style="font-size:12px; color:green">√</span>')
                $("#span_password1").next().remove();
                return false;
            }
      })

      //验证邮箱
      $("input[name='email']").blur(function(){
          var email = $(this).val();
          var reg = /^[A-Za-zd0-9]+([-_.][A-Za-zd]+)*@([A-Za-zd0-9]+[-.])+[A-Za-zd]{2,5}$/;
          if(email == ""){
                $("input[name='email']").after('<span id="span_email" style="font-size:12px; color:red">邮箱不能为空</span>');
                $("#span_email").next().remove();
                return false;
          }else if(!reg.test(email)){
                $("input[name='email']").after('<span id="span_email" style="font-size:12px; color:red">邮箱格式不正确</span>');
                $("#span_email").next().remove();
                return false;
          }else{
                $("input[name='email']").after('<span id="span_email" style="font-size:12px; color:green">√</span>')
                $("#span_email").next().remove();
                return false;
          }
      })

      //验证手机号
      $("input[name='phone']").blur(function(){
          var phone = $(this).val()
          if(phone == ""){
                $("input[name='phone']").after('<span id="span_phone" style="font-size:12px; color:red">电话号码不能为空</span>');
                $("#span_phone").next().remove();
                return false;
          }else if(!(/^1[3|4|5|7|8][0-9]\d{8}$/.test(phone))){
                $("input[name='phone']").after('<span id="span_phone" style="font-size:12px; color:red">电话号码格式不正确</span>');
                $("#span_phone").next().remove();
                return false;
          }else{
               $("input[name='phone']").after('<span id="span_phone" style="font-size:12px; color:green">√</span>')
                $("#span_phone").next().remove();
                return false;
          }
      })

      //正则验证验证码
      $("input[name='captcha']").blur(function(){
          var captcha = $(this).val();
          if(captcha == ""){
                $("#change").after('<span id="span_captcha" style="font-size:12px; color:red">验证码不能为空</span>');
                $("#span_captcha").next().remove();
                return false;
          }else if(captcha !== ""){
                $.get("{{ URL('/checkCaptcha') }}",{
                    'captcha':captcha
                },function(res){
                    if(res.error==0){
                        $("#change").after('<span id="span_captcha" style="font-size:12px; color:red">×</span>');
                        $("#span_captcha").next().remove();
                        return false;
                    }else{
                        $("#change").after('<span id="span_captcha" style="font-size:12px; color:green">√</span>');
                        $("#span_captcha").next().remove();
                        return false;
                    }
                },"json");
          }
      })


      //阻止提交
      $("#submit").click(function(){
            var checked = $("#checked").is(':checked');
          
            var username = $("input[name='username']").val();
            var password = $("input[name='password']").val();
            var password1 = $("input[name='password1']").val();
            var email = $("input[name='email']").val();
            var phone = $("input[name='phone']").val();
            var captcha = $("input[name='captcha']").val();
           if(username==""){
                $("input[name='username']").after('<span id="span_username" style="font-size:12px; color:red">用户名不能为空</span>');
                $("#span_username").next().remove();
                return false;
            }else if(password == ""){
                $("input[name='password']").after('<span id="span_password" style="font-size:12px; color:red">密码不能为空</span>');
                $("#span_password").next().remove();
                return false;
            }else if(password1 == ""){
                $("input[name='password1']").after('<span id="span_password1" style="font-size:12px; color:red">确认密码不能为空</span>');
                $("#span_password1").next().remove();
                return false;
            }else if(email == ""){
                $("input[name='email']").after('<span id="span_email" style="font-size:12px; color:red">邮箱不能为空</span>');
                $("#span_email").next().remove();
                return false;
            }else if(phone == ""){
                $("input[name='phone']").after('<span id="span_phone" style="font-size:12px; color:red">电话号码不能为空</span>');
                $("#span_phone").next().remove();
                return false;
            }else if(captcha == ""){
                $("#change").after('<span id="span_captcha" style="font-size:12px; color:red">验证码不能为空</span>');
                $("#span_captcha").next().remove();
                return false;
            }else if($("#checked").is(':checked')==false){
                $(".r_txt").after('<span id="span_checked" style="font-size:12px; color:red">请勾选</span>');
                $("#span_checked").next().remove();
                return false;
            }else{
                return true;
            }
      })

  })

  
</script>
