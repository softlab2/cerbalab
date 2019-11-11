$(document).ready(function(){
	$('body').on('click','.comparebtn',function(e){//кнопка
		var btn=$(this);
		$.post('/_useModule/11/getAjax/',{'id':$(this).attr('id'),'act':'act'},function(data){
			if(data.msg)msgbox(data.msg,'','',false);
			cart_updateBtnContent(btn,false);
			setTimeout(cart_updateSmallCart,100);
		},'json');
		e.preventDefault();
	});
	
	$('body').on('click','.compare_item_delete',function(e){//удаляем из таблицы
		var btn=$(this);
		$.post('/_useModule/11/getAjax/',{'id':$(this).attr('id'),'act':'act','getTbl':1},function(data){
			if(data.msg)msgbox(data.msg,'','',false);
			btn.parents('tr').hide('fast',function(){
				$(this).remove();
				var cont=$('.cms_compare');
				if(cont.find('.cms_catalog_item').length==0){
					$.post('/_useModule/11/getCompareTable/',function(data){
						cont[0].outerHTML=data;
					});
				}
			});
			setTimeout(cart_updateSmallCart,100);
		},'json');
		e.preventDefault();
	});
	
	$('body').on('change','.cms_cartselparam',function(e){
		var par=$(this).parents('.cms_catalog_item');
		var v=$(this).val();
		if(v==0||v==''||typeof(v)=='undefined')return false;
		var oId2=par.find('.compare_item_delete');
		if(oId2.length==0){
			console.log('Нет кнопки .compare_item_delete с правильным id :(');
			return false;
		}
		$.post('/_useModule/11/getAjax/',{'id':oId2.attr('id'),'newtail':v,'act':'change_tail'},function(data){
			if(data.html){
				oId2.attr('id',cart_setTail(oId2.attr('id'),v));
			}else data.msg=data.msg+' Ошибка :(';
			if(data.msg)msgbox(data.msg,'','',false);
		},'json');	
	});	
});