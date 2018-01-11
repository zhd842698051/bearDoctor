@extends('layout.userCommon')
@section('content')
    <div class="m_right">
        <p></p>
        <div class="mem_tit">已购买的商品</div>
        <table border="0" class="order_tab" style="width:930px; text-align:center; margin-bottom:30px;" cellspacing="0" cellpadding="0">
            <tr>
                <td width="10%">订单号</td>
                <td width="15%">商品名称</td>
                <td width="15%">交易时间</td>
                <td width="10%">订单类型</td>
                <td width="10%">是否使用道具</td>
                <td width="10%">实付金额</td>
                <td width="15%">操作</td>
            </tr>
            <tr>
                <td><font color="#ff4e00">2015092823056</font></td>
                <td>小米手机</td>
                <td>2015-09-26   16:45:20</td>
                <td>普通交易</td>
                <td>使用红包</td>
                <td>￥652.00</td>
                <td>取消订单</td>
            </tr>
        </table>



    </div>
    <!--End 用户中心 End-->
@endsection
