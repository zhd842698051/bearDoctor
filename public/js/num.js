function addUpdate1(jia){		
	var c = jia.parent().find(".car_ipt").val();
	c=parseInt(c)+1;
	var money = jia.parent().find(".hide_money").val();
	var count_money = jia.parents('div').find('#count_money').html();
	count_money = parseInt(count_money)+parseInt(money);
	money = money*c;
	jia.parents('div').find('#count_money').html(count_money+'.00');
	jia.parents('tr').find('.money').html(money+'.00');
	jia.parent().find(".car_ipt").val(c);
}

function jianUpdate1(jian){    
	var c = jian.parent().find(".car_ipt").val();
	if(c==1){    
		c=1;
		return false;   
	}else{    
		c=parseInt(c)-1;    
		jian.parent().find(".car_ipt").val(c);
	}
	var money = jian.parent().find(".hide_money").val();
	var count_money = jian.parents('div').find('#count_money').html();
	count_money = parseInt(count_money)-parseInt(money);
	money = parseInt(money)*c;
	jian.parents('div').find('#count_money').html(count_money+'.00');
	jian.parents('tr').find('.money').html(money+'.00');
}