<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link type="text/css" rel="stylesheet" href="{{asset('css')}}/style.css" />
    <!--[if IE 6]>
    <script src="{{asset('js')}}/iepng.js" type="text/javascript"></script>
        <script type="text/javascript">
           EvPNG.fix('div, ul, img, li, input, a'); 
        </script>
    <![endif]-->    
    <script type="text/javascript" src="{{asset('js')}}/jquery-1.11.1.min_044d0927.js"></script>
	<script type="text/javascript" src="{{asset('js')}}/jquery.bxslider_e88acd1b.js"></script>
    
    <script type="text/javascript" src="{{asset('js')}}/jquery-1.8.2.min.js"></script>
    <script type="text/javascript" src="{{asset('js')}}/menu.js"></script>    
        
	<script type="text/javascript" src="{{asset('js')}}/select.js"></script>
    
	<script type="text/javascript" src="{{asset('js')}}/lrscroll.js"></script>
    
    <script type="text/javascript" src="{{asset('js')}}/iban.js"></script>
    <script type="text/javascript" src="{{asset('js')}}/fban.js"></script>
    <script type="text/javascript" src="{{asset('js')}}/f_ban.js"></script>
    <script type="text/javascript" src="{{asset('js')}}/mban.js"></script>
    <script type="text/javascript" src="{{asset('js')}}/bban.js"></script>
    <script type="text/javascript" src="{{asset('js')}}/hban.js"></script>
    <script type="text/javascript" src="{{asset('js')}}/tban.js"></script>
    
	<script type="text/javascript" src="{{asset('js')}}/lrscroll_1.js"></script>
    
    
<title>尤洪</title>
</head>
<body>  
<!--Begin Header Begin-->
<div class="soubg">
	<div class="sou">
        <span class="fr">
        	<span class="fl">你好，请<a href="Login.html">登录</a>&nbsp; <a href="Regist.html" style="color:#ff4e00;">免费注册</a>&nbsp; </span>
            <span class="fl">|&nbsp;关注我们：</span>
            <span class="s_sh"><a href="#" class="sh1">新浪</a><a href="#" class="sh2">微信</a></span>
            <span class="fr">|&nbsp;<a href="#">手机版&nbsp;<img src="{{asset('images')}}/s_tel.png" align="absmiddle" /></a></span>
        </span>
    </div>
</div>
<!--End Header End--> 
<!--Begin Login Begin-->
<div class="log_bg">	
    <div class="top">
        <div class="logo"><a href="Index.html"><img src="{{asset('images')}}/logo.png" /></a></div>
    </div>
	<div class="login">
    	<div class="log_img"><img src="{{asset('images')}}/l_img.png" width="611" height="425" /></div>
        @yield('content')
    </div>
</div>
<!--End Login End--> 
<!--Begin Footer Begin-->
<div class="btmbg">
    <div class="btm">
        备案/许可证编号：蜀ICP备12009302号-1-www.dingguagua.com   Copyright © 2015-2018 尤洪商城网 All Rights Reserved. 复制必究 , Technical Support: Dgg Group <br />
        <img src="{{asset('images')}}/b_1.gif" width="98" height="33" /><img src="{{asset('images')}}/b_2.gif" width="98" height="33" /><img src="{{asset('images')}}/b_3.gif" width="98" height="33" /><img src="{{asset('images')}}/b_4.gif" width="98" height="33" /><img src="{{asset('images')}}/b_5.gif" width="98" height="33" /><img src="{{asset('images')}}/b_6.gif" width="98" height="33" />
    </div>      
</div>
<!--End Footer End -->    

</body>


<!--[if IE 6]>
<script src="//letskillie6.googlecode.com/svn/trunk/2/zh_CN.js"></script>
<![endif]-->
</html>