$(document).ready(function(){
	$('body').on('submit','form.cms_feedback_form',function(e){
		cms_feedback_frame_send($(this));
		e.preventDefault();
	});
	//кнопка заказать звонок (msgbox)
	$('.modal_fom_lnk').click(function(e){
		if($('#'+$(this).attr('data-formlabel')).length>0){
			var txt=$.trim($('#'+$(this).attr('data-formlabel'))[0].outerHTML);
			if(txt)msgbox(txt,'Заказать',$(this).attr('data-formlabel'));
		}else msgbox('<div style="color:red;">Ошибка. Попробуйте позже.</div>','Хорошо');
		e.preventDefault();
		return false;
	});
	
	$('body').on('click','#lea_msgbox_ok',function(e){
		var form=$(this).attr('data-param');
		var oForm=$(this).parents('#lea_msgbox').find('form').eq(0);
		if(typeof form!='undefined'&&form==oForm.attr('id')){
			cms_feedback_frame_send(oForm);
		}		
		e.preventDefault();
	});
	
	function cms_feedback_frame_send(oform){	
		$('#cms_feedback_frame').remove();
		var n_frm=$('<iframe>',{'id':'cms_feedback_frame'}).appendTo('body');
		n_frm.css({
			'width':'0',
			'height':'0',
			'position':'absolute',
			'top':'-10px'
		});
		n_frm=n_frm[0];
		n_frm.contentWindow.document.open();
		n_frm.contentWindow.document.write('<body></body>');
		n_frm.contentWindow.document.close();
		n_frm=$(n_frm);

		var frameBody=$('<div>').appendTo(n_frm.contents().find('body'));
		
		oformBlank=oform.clone(true).insertAfter(oform);
		var n_form=oform.appendTo(frameBody);	

		$('<input>',{'name':'returnJS','value':'Y'}).appendTo(n_form);
		frameBody.find('form').trigger('submit');
	}
});
window.cms_feedback_updateForm=function(e){
	var oForm=$('#'+e.id);
	oForm[0].outerHTML=e.html;
	var qaps=$('.QapTcha');
	if(qaps.length>0){
		qaps.html('');
		qaps.QapTcha({disabledSubmit:true,autoRevert:true});
	}		
	if(e.error&&e.error.length>0){
		msgbox(e.error);		
	}else if(e.successTxt){
		msgbox(e.successTxt);
		if(oForm.hasClass('cms_cart_add_form')){
			cart_updateSmallCart('0_0_0_0');
			cart_refresh('0_0_0_0');
		}		
	}	
	$('body').trigger('feedbackAfterUpdate');
}