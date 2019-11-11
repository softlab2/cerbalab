window.cartItemsCount=0;
$('document').ready(function(){
	$('body').on('click','.check_order',function(e){
		var checked = true;
		$('.check_order').each(function(index, item){
			checked = checked && $(item).is(':checked');
		});
		if(checked){
			$('#checkout').addClass('blue');
			$('#checkout').attr('disabled', false);
		}else{
			$('#checkout').removeClass('blue');
			$('#checkout').attr('disabled', true);
		}
	});
	$('body').on('click','.addcartbtn',function(e){
		var id = $(this).data('id');
		$.ajax({
			url: '/cart/add/'+id,
			dataType: 'JSON',
			method: 'GET',
			success: function(data){
				$('#add_'+id).attr('style', 'display:none');
				$('#remove_'+id).attr('style', 'display:block');
				$('#cart_informer').html(' ' +data.count + ' шт. - ' + data.total + ' руб.');
			}
		});
		return false;
	});

	$('body').on('click','.removecartbtn',function(e){
		var id = $(this).data('id');
		$.ajax({
			url: '/cart/remove/'+id,
			dataType: 'JSON',
			method: 'GET',
			success: function(data){
				$('#add_'+id).attr('style', 'display:block');
				$('#remove_'+id).attr('style', 'display:none');
				$('#cart_informer').html(' ' +data.count + ' шт. - ' + data.total + ' руб.');
			}
		});
		return false;
	});

	$('body').on('click','.removeitemcartbtn',function(e){
		var id = $(this).data('id');
		$.ajax({
			url: '/cart/remove/'+id,
			dataType: 'JSON',
			method: 'GET',
			success: function(data){
				$('#tr_'+id).remove();
				$('#item_'+id+'_hidden').remove();
				if(!data.count){
					$('#cms_fullcart').attr('style', 'display:block');
					$('#cart_list').attr('style', 'display:none');
				}
				$('#cart_informer').html(' ' +data.count + ' шт. - ' + data.total + ' руб.');
			}
		});
		return false;
	});

	$('body').on('click','.cartbtn',function(e){

		cart_updateBtn(this);
		e.preventDefault();
		return false;
	});
	$('body').on('click','.cartbtn_remove',function(e){
		var obj=this;
		$(this).parents('tr').hide('fast',function(){$(this).remove();cart_removeItem(obj);});
		e.preventDefault();
		return false;
	});
	$('body').on('change','.cms_qty',function(e){
		if($(this).val()<1){
			$(this).val(1);
			e.preventDefault();
			return false;
		}
		var obj=$(this);
		if(typeof(window.cms_qtytId)!='undefined')clearTimeout(window.cms_qtytId);
		window.cms_qtytId=setTimeout(function(){
			cart_changeQty(obj.attr('id'),obj.val());
		},200);
		e.preventDefault();
		return false;
	});
	$('body').on('click','a.cms_catalog_post',function(e){
		catalog_getpage(this);
		e.preventDefault();
		return false;
	});
	$('body').on('change','select.cms_catalog_post',function(e){
		$(this).attr('data-href',$(this).find('option:selected').eq(0).attr('value'));
		catalog_getpage(this);
		e.preventDefault();
		return false;
	});
	$('body').on('change','input.cms_catalog_post:checked',function(e){
		$(this).attr('data-href',$(this).val());
		catalog_getpage(this);
		e.preventDefault();
		return false;
	});
	//event - каталог загружен
	$('body').on('catalogAfterUpdate',function(){
		if(window.cms_catalog_updateElements){
			$.each(window.cms_catalog_updateElements,function(k,oHtml){
				var idKey=Object.keys(oHtml)+'';
				var aId=cart_checkCartBtnID(idKey);
				var id=$('[id^='+aId[0]+'_'+aId[1]+'_'+aId[2]+']').eq(0).attr('id');
				var oItem=catalog_getConteinerItem($('#'+id)[0]);
				if(oItem.length>0)oItem[0].outerHTML=oHtml[idKey];
			});
		}
		window.cms_catalog_updateElements=false;
		$("document").ready(function(){$("body").trigger("user_catalogAfterUpdate");});
	});
	//tail change param
	$('body').on('change','.cms_cartselparam',function(e){
		var par=$(this).parents('.cms_catalog_item');
		if(typeof($(this).attr('data-key'))=='undefined'){
			console.log('Нет атрибута data-key :(');
		}else{
			var sSelector='select.cms_cartselparam';
			if(this.id)sSelector='#'+this.id;
			catalog_getIdMultiTail(par,sSelector);
		}
		e.preventDefault();
		return false;
	});
	//tail setInCart param
	$('body').on('change','.cms_cartselparam_set',function(e){
		var par=$(this).parents('.cms_catalog_item');
		if(typeof($(this).attr('data-key'))=='undefined'){
			console.log('Нет атрибута data-key :(');
		}else{
			catalog_getIdMultiTail(par,'select.cms_cartselparam_set',true);
		}
		e.preventDefault();
		return false;
	});	
});
function catalog_getIdMultiTail(par,sSelector,setTail){
	var btn=par.find('.cartbtn').eq(0);
	var btnId=btn.attr('id');
	var aTail=[];
	par.find(sSelector).each(function(){aTail[$(this).attr('data-key')]=$(this).val();});
	if(aTail.length>0){
		var tail=aTail.join('_');
		if(setTail==true){
			catalog_loadItemFromTail(btnId,tail,false);
			cart_changeTail(btnId,tail);	
		}else{					
			catalog_loadItemFromTail(btnId,tail);
		}	
	}else{
		console.log('Не тот хвост :(');
	}	
}
function catalog_loadItemFromTail(btnId,newTail,update){
	if(typeof(update)=='undefined')update=true;
	var cartBtn=$('#'+btnId);
	if(cartBtn.length>0){
		var newBtnId=btnId;
		if(newTail)
			newBtnId=cart_setTail(btnId,newTail);
		cartBtn.attr('id',newBtnId);
		if(update)cart_updateBtnContent(cartBtn);
	}else console.log('Не найден id кнопки! ('+btnId+')');
}
function catalog_getConteinerItem(obj){
	var obj=$(obj).parents('.cms_catalog_item').eq(0);
	if(obj.length>0)return obj;
	else{
		console.log('Не найден родительский элемент .cms_catalog_item :(');
		return false;
	}
}
function catalog_getpage(obj){
		if($(obj).attr('data-container'))var cont=$(obj).attr('data-container');
		else return false;
		if(cont=='')return false;
		var cont=$(cont).eq(0);
		if(typeof(cont)!='object')return false;
		cont.css('position','relative');
		cont.parent().css('position','relative');
		var timerLoading=window.setTimeout(function(){
			$('<div style="position:absolute;top:20px;left:50%;"><img src="/pics/def/loading.gif"/><div>').appendTo(cont);
		},500);
		$.post($(obj).attr('data-href'),{'ajax':'y'},function(data){
			if(data.html){
				clearTimeout(timerLoading);
				var oldCont=cont.clone().insertBefore(cont);
				oldCont.attr('id','cms_old_cont');
				oldCont.css({'position':'absolute'});
				cont.css('opacity',0);
				cont.html(data.html);
				cont.animate({'opacity':1},'fast');
				oldCont.animate({'opacity':0},'fast',function(){$(this).remove()});
			}
		},'json');
}
function cart_refresh(htmlId){
	var oCart=$('#cms_fullcart');
	if(oCart.length==0)return false;
	var uform=$('.cms_cart_add_form');
	var postData='act=refreshCart&id='+htmlId;
	if(uform.length>0)postData+='&'+uform.eq(0).serialize();
	$.post('/_useModule/4/getcart/',postData,function(data){
		if(typeof(data)=='object'){
			if(data.msg)msgbox(data.msg,'','',false);
			if(data.html){
				cart__refresh(data.html,oCart[0]);
				$("document").ready(function(){$("body").trigger("catalogAfterUpdate");});
			}
		}
	},'json');
}
function cart__refresh(html,oCart){
	if(typeof(oCart)=='undefined')var oCart=$('#cms_fullcart')[0];
	if($(oCart).length==0)return false;
	oCart.outerHTML=html;
	var qaps=$('#cms_fullcart').find('.QapTcha').eq(0);
	if(qaps.length>0){
		qaps.html('');
		qaps.QapTcha({disabledSubmit:true,autoRevert:true});
	}
}
function cart_changeQty(htmlId,qty,updateBtn){
	if(typeof(updateBtn)=='undefined')var updateBtn=false;
	if(qty<1){qty=1;return false;}
	$.post('/_useModule/4/getcart/',{'act':'changeQty','id':htmlId,'count':qty},function(data){
		if(typeof(data)=='object'){
			var aId=cart_checkCartBtnID(htmlId);			
			if(aId){
				if(data.updBtn){
					var btn=$('#item_'+aId[1]+'_'+aId[2]+'_'+aId[3]);
					if(updateBtn&&btn.length>0)cart_updateBtnContent(btn);
					cart_refresh(htmlId);
					cart_updateSmallCart(htmlId);
				}
			}
			if(data.msg)msgbox(data.msg,'','',false);
		}
	},'json');
}
function slide2div(odiv,ndiv,speed){
	odiv[0].outerHTML=ndiv;
	return ndiv;
	if(typeof(speed)=='undefined')var speed=1000;
	if(odiv.parents('table').length>0)speed=0;
	ndiv.css('opacity','0');
	var ncont=odiv.clone();
	var ncontMargin=odiv.css('margin');
	var ret=ndiv;
	ncont.attr('class','');
	ncont.attr('style','');
	ncont.css({
		'width':odiv.width()+'px',
		'height':odiv.height()+'px',
		'position':'relative',
		'margin':ncontMargin
	});
	//костылик
	if(ncont.is('li')&&ncont.hasClass('slick-slide')){
		ncont.css('float','left');
	}	
	odiv.css({
		'width':odiv.width()+'px',
		'height':odiv.height()+'px',
		'position':'absolute',
		'top':-parseInt(odiv.css('border-top')),
		'left':-parseInt(odiv.css('border-left')),
		'margin':0
	});
	ndiv.css({
		'width':odiv.width()+'px',
		'height':odiv.height()+'px',
		'position':'absolute',
		'top':-parseInt(odiv.css('border-top')),
		'left':-parseInt(odiv.css('border-left')),
		'margin':0
	});
	ncont.empty();
	ncont=ncont.insertBefore(odiv);
	odiv=odiv.appendTo(ncont);
	ndiv.insertBefore(odiv);
	ndiv.css('opacity','1');
	odiv.animate({'opacity':0},speed,function(){
		ndiv.attr('style','');
		odiv.remove();
		ndiv.insertAfter(ncont);
		ncont.remove();
	});
	return ret;
}
function cart_updateBtnContent(obj,update){
	if(typeof(update)=='undefined')update=false;
	var htmlId=$(obj).attr('id');
	var contItem=catalog_getConteinerItem(obj);

	if(contItem.length>0){

		var tpl=contItem.attr('data-tpl');
		if(typeof(tpl)=='undefined'){tpl='';console.log('нет названия шаблона для вывода:(')}
		var itemCount=1;
		var aId=cart_checkCartBtnID(htmlId);
		var objCount=$('#qty_'+aId[1]+'_'+aId[2]+'_'+aId[3]);
		if(objCount.length>0)itemCount=parseInt(objCount.val());
		$.post('/_useModule/4/getcart/',{'act':'updateBtn','id':htmlId,'count':itemCount,'tpl':tpl},function(data){
			if(typeof(data)=='object'){
				if(data.html){
						slide2div(contItem,data.html);
					$("document").ready(function(){$("body").trigger("catalogAfterUpdate");});			
					if(update){
						cart_updateSmallCart(htmlId);
						cart_refresh(htmlId);
					}
				}
				if(data.msg)msgbox(data.msg,'','',false);
			}
		},'json');
	}
}
function cart_updateBtn(obj,update){
	if(typeof(update)=='undefined')update=true;
	var htmlId=$(obj).attr('id');
	var contItem=catalog_getConteinerItem(obj);
	if(contItem.length>0){
		var tpl=contItem.attr('data-tpl');
		if(typeof(tpl)=='undefined'){tpl='';console.log('нет названия шаблона для вывода:(')}
		var itemCount=1;
		var aId=cart_checkCartBtnID(htmlId);
		var objCount=$('#qty_'+aId[1]+'_'+aId[2]+'_'+aId[3]);
		if(objCount.length>0)itemCount=parseInt(objCount.val());
		$.post('/_useModule/4/getcart/',{'act':'btnAction','id':htmlId,'count':itemCount,'tpl':tpl},function(data){
			if(typeof(data)=='object'){
				if(data.html){
					slide2div(contItem,data.html);
					$("document").ready(function(){$("body").trigger("catalogAfterUpdate");});
					if(update){
						cart_updateSmallCart(htmlId);
						cart_refresh(htmlId);
					}
				}
				if(data.msg)msgbox(data.msg,'','',false);
			}
		},'json');
	}
}
function cart_removeItem(obj){
	var htmlId=$(obj).attr('id');
	$.post('/_useModule/4/getcart/',{'act':'removeItemFromCart','id':htmlId},function(data){
		if(typeof(data)=='object'){
			//if(data.html){
				//$(obj)[0].outerHTML=data.html;
				cart_updateSmallCart(htmlId);
				cart_refresh(htmlId);
			//}
			if(data.msg)msgbox(data.msg,'','',false);
		}
	},'json');
}
function cart_updateSmallCart(htmlId){
	if(typeof(htmlId)=='undefined')htmlId='0_0_0_0';
	var carts=$('.small_cart_box');
	window.cartItemsCount=0;
	if(carts.length==0)return false;
	$.post('/_useModule/4/getcart/',{'act':'getSmallCart','id':htmlId},function(data){
		if(typeof(data.html)=='string'){
			$.each(carts,function(k,v){
				$(v)[0].outerHTML=data.html;
			});
		}
		if(data.msg)msgbox(data.msg,'','',false);
		window.cartItemsCount=data.count;
	},'json');
}
function cart_changeTail(htmlId,tail){
	$.post('/_useModule/4/getcart/',{'act':'changeMultiTail','id':htmlId,'newTail':tail},function(data){
		if(typeof(data)=='object'){
			cart_updateSmallCart(htmlId);
			cart_refresh(htmlId);
			if(data.msg)msgbox(data.msg,'','',true);
		}
	},'json');
}
function cart_setTail(id,tail){
	var aId=cart_checkCartBtnID(id);
	if(aId){
		id=aId[0]+'_'+aId[1]+'_'+aId[2]+'_'+tail;
	}
	return id;
}
function cart_checkCartBtnID(id){//id товара
	var tmp=id.split('_');
	if(tmp.length<4||typeof Number(tmp[1])!='number'||typeof Number(tmp[2])!='number'||tmp[1]==''||tmp[2]==''||tmp[3]==''){
		console.log('Неверный ID ...');return false;
	}else{
		var ret=[];
		ret[0]=tmp[0];
		ret[1]=tmp[1];
		ret[2]=tmp[2];
		ret[3]=tmp.slice(3).join('_');
		return ret;
	}
}