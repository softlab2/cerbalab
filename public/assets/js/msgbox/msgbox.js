//lobaschuk@gmail.com
function msgbox(txt,ok_txt,data_param,showBtn){	
	msgbox_remove();
	if(window.msgboxTimerHandler)window.clearTimeout(window.msgboxTimerHandler);
	if(typeof showBtn=='undefined')showBtn=true;
	if(typeof(ok_txt)=='object'&&ok_txt.length==2){
		cancel_txt=ok_txt[1];
		ok_txt=ok_txt[0];
	}else{
		if(!ok_txt)ok_txt='Ok';
		var cancel_txt='';	
	}	
	var msg=$('<div>',{'id':'lea_msgbox','style':'display:none'}).appendTo('body');
	msg.html('<div id="lea_msgbox_text">'+txt+'</div>');
	msgbox_resize(msg);
	msg.fadeIn(300);
	if(showBtn){
		var btns=$('<div>',{'id':'lea_msgbox_btns'}).appendTo(msg);
		var msg_ok=$('<div>',{'data-param':data_param,'id':'lea_msgbox_ok','class':'lea_btn button'}).appendTo(btns);msg_ok.html('<span>'+ok_txt+'</span>');
		var msg_cancel=$('<div>',{'data-param':data_param,'id':'lea_msgbox_cancel','class':'lea_btn'}).appendTo(btns);msg_cancel.html('<span>'+cancel_txt+'</span>');
		msg_ok.bind('click',function(){msgbox_onClose(msg);$('body').trigger('leamsgOnOk_'+data_param);});
		msg_cancel.bind('click',function(){msgbox_onClose(msg);});
		btns.css('width',10+(parseInt(msg_ok.outerWidth())+parseInt(msg_cancel.outerWidth())));
		if(cancel_txt==''){
			msg_cancel.css('display','none');
			btns.css('width',(parseInt(btns.outerWidth())-parseInt(msg_cancel.outerWidth())));
			msg_ok.css('margin-left',(btns.outerWidth()/2)-msg_ok.outerWidth()/2);
		}		
	}
	var msg_x=$('<div>',{'data-param':data_param,'text':'x','id':'lea_msgbox_x','style':'position:absolute;top:5px;right:8px;font-size:18px;cursor:pointer;'}).appendTo(msg);
	msg_x.bind('click',function(){msgbox_onClose(msg);});
	if(showBtn){
		var overlay=$('<div>',{'id':'lea_overlay'}).appendTo($('body'));
		overlay.bind('click',function(){msgbox_onClose(msg);});
	}	
	$(document).keydown(function(eventObject){if(eventObject.which==27){msgbox_onClose(msg);}});		
	if(showBtn==false)window.msgboxTimerHandler=window.setTimeout(function(){msgbox_onClose(msg)},2000);
	$(window).resize(function(){msgbox_resize(msg);});
	function msgbox_resize(msg){
		msg_width=msg.outerWidth();
		msg_height=msg.outerHeight();
		var dv=20;
		var dh=(($(window).width()/2)+$(document).scrollLeft())-msg_width/2;
		msg.css({
			'position':'fixed',
			'top':dv,
			'left':dh,
			'z-index':'1002',
		});
	}
	function msgbox_remove(){		
		var msg=$('div#lea_msgbox');
		if(msg.length>0){
			msg.stop();
			$('div#lea_msgbox_ok').remove();
			$('div#lea_msgbox_cancel').remove();
			msg.remove();
			$('div#lea_overlay').remove();
		}	
	}
	function msgbox_onClose(msg){
		msg.fadeOut(300,function(){
			msgbox_remove();
		});
		$('div#lea_overlay').remove();
	}
}