var mobileWidth=640;
var desktopWidth=1000;


function hideMenus(exception){
  if (window.innerWidth<=mobileWidth) {
    $('.triggered').not($(exception)).removeClass('triggered');
    $('.mobileMenu .menuButton').not($(exception)).each(function(){
      if($(this).hasClass('menuIsVisible'))      mobileMenuToggle(this);
    });
  }
}

function mobileMenuInit(menuClassName){
  if ($('.'+menuClassName).length<1) menuClassName='mobileMenu';
  if (window.innerWidth<desktopWidth){
    
    $('.'+menuClassName).each(function(){
      var currentMenu = this;
      var elementNumber=0;
      var menu_elements_width=50; var mobileMenuActive = 0; 
      $(currentMenu).find('.menuItem').removeClass('inMobileMenu').removeClass('visible').attr('style','');
      $(currentMenu).find('.menuItem').each(function(){
        menu_elements_width += $(this).width();
        
        if(window.innerWidth<=mobileWidth){
          mobileMenuActive=1;
          elementNumber++;
          $(this).addClass('inMobileMenu').css('top',elementNumber*57+'px');
        }
        else if (menu_elements_width>$(currentMenu).width() || menu_elements_width>$(currentMenu).closest('.headerMenuContainer').width()){
          mobileMenuActive=1;
          elementNumber++;
          if(elementNumber===1)  $(this).addClass('inMobileMenu').css('top','39px');
          else $(this).addClass('inMobileMenu').css('top',elementNumber*57-17+'px');
          //elementPosition=elementPosition*++;
          //elementNumber++;
        }
        
      });
      if (mobileMenuActive){
        if($(currentMenu).find('.menuButton').size()==0){$(currentMenu).append('<div class="top_menu_item menuButton">≡</div>');}
      }
      else {
        if($(currentMenu).find('.menuButton').size()>0)$(currentMenu).find('.menuButton').remove();
      }
      if($(currentMenu).find('.menuButton').size()>0){
        if ($(currentMenu).find('.menuButton').hasClass('menuIsVisible'))$(currentMenu).find('.inMobileMenu').removeClass('visible').addClass('visible'); 
        else $(currentMenu).find('.inMobileMenu').removeClass('visible'); 
      }
      
      
      // alert($(currentMenu).width());
    });
  }
  else {
    $('.'+menuClassName).each(
      function(){
        var currentMenu = this;
        if($(currentMenu).find('.menuButton').size()>0){
          $(currentMenu).find('.menuButton').remove();
        }
        $(currentMenu).find('.inMobileMenu').attr('style','').removeClass('visible').removeClass('inMobileMenu')
          });
      }
      }
      
      function mobileMenuToggle(obj){
      $(obj).closest('.mobileMenu').find('.inMobileMenu').toggleClass('visible');
    $(obj).toggleClass('menuIsVisible');
  }
  
  $(window).on('load resize',function(){
    $('.nivoSlider>img').each(function(){
      var x = $(this).css('left',-this.clientWidth/2);
    });
    
    if (window.innerWidth<=mobileWidth){
      $('main .container').height($('main .container').width()*1.0);
      if(window.innerHeight>=$('body').height()){
        $('.leftMenuContainer').height(window.innerHeight-$('header').height()-$('footer').height());
      }
      else{ 
        $('.leftMenuContainer').height(window.innerHeight);
      }
    }
    else if (window.innerWidth<=desktopWidth){
      $('main .container').height($('main .container').width()*0.52);
      if(window.innerHeight>=$('body').height()){
       $('.leftMenuContainer').height(window.innerHeight-$('header').height()-$('footer').height());
      }
      else{ 
        $('.leftMenuContainer').height(window.innerHeight);
      }
    }
    else {
      $('main .container').height($('main .container').width()*0.52);
       $('.leftMenuContainer').height('auto');
    }
    
    mobileMenuInit();
    
    
    
    $('.tabsContainer').each(function(){  

      var totalWidth=10;
      $(this).find('.tabControl').each(function(){
            $(this).css('left',totalWidth+'px');
            totalWidth+=$(this).outerWidth() + 15;

      });
   });
    
   
  });
/*   $(window).on('load',function(){
     $('.leftMenuItem a.active').closest('.leftMenuItem').addClass('open').find('span').addClass('active');
     $('.leftMenuItem a.active').closest('.leftSubMenu').slideDown(300);
   });*/
  
  $(document).ready(function(){
    $('.heightLimit').each(function(){
      curElem=$(this);
      heightLimit=curElem.attr('data-heightLimit');
      if (!heightLimit) heightLimit=300;

      curElem.css({'overflow':'hidden','position':'relative', 'height':heightLimit}).append($('<div class="heightLimitButton closed">'+$(this).attr('data-showText')+'</div>').click(function(e){
        e.preventDefault();
        e.stopPropagation();
        if($(e.target).is('.closed')){
          $(e.target).html($(e.target).closest('.heightLimit').attr('data-hideText')).removeClass('closed');
          $(e.target).closest('.heightLimit').css('height','auto');
        }
        else{
          $(e.target).html($(e.target).closest('.heightLimit').attr('data-showText')).addClass('closed');
          $(e.target).closest('.heightLimit').css('height',$(e.target).closest('.heightLimit').attr('data-heightLimit'));
        }
      }));
    });
    

    
    $('.mobileMenu').on('click','.menuButton',function(e){
      e.stopPropagation();
      mobileMenuToggle(e.target);
      hideMenus(e.target);
    });
    
    $('.activeMenu').lea_menuactive();
    
    $('.callback').click(function(){
      msgbox('<form  id="form_header_telform"><label><span>Фамилия и имя:  </span><input   name="zakaz_zvon[p1]"  type="text"  placeholder=""></label><label><span>Контактный телефон:  </span><input  name="zakaz_zvon[p2]"  type="text"  placeholder="8(921) 555-55-55"></label><label><span>Удобное время для звонка</span><input  name="zakaz_zvon[p3]"  type="text"  placeholder="Вторник утро"></label><label><span>Сообщение</span><textarea  name="zakaz_zvon[p4]"  placeholder=""></textarea></label></form>','Заказать звонок','zakaz_zvon');
    });
    
    $('body').on('click','#lea_msgbox_ok',function(){
      if($(this).attr('data-param')=='zakaz_zvon'){
        var form=$(this).parents('div#lea_msgbox').find('form').eq(0);
        $.post('/send_eml.php',form.serialize(),function(data){
          if(data){
            setTimeout('msgbox("'+data+'")',500);
            form.trigger('reset');
          }
        });
      }
    });
    
    $('.leftSubMenu a').click(function(e){e.stopPropagation();});
    $('.leftMenuItem>a, .leftMenuItem>span').click(function(e){
      e.stopPropagation();
      $(e.target).closest('.leftMenuItem').find('.leftSubMenu').slideToggle();
      $(e.target).closest('.leftMenuItem').toggleClass('open');
      $('.leftMenuItem').not($(e.target).closest('.leftMenuItem')).removeClass('open').find('.leftSubMenu').slideUp();

    });
    

    
    $('.leftMenuTrigger').click(function(e){
      $(e.target).closest('.leftMenuContainer').toggleClass('triggered');
      hideMenus($(e.target).closest('.leftMenuContainer'));
    });
    
    $('.leftMenuContainer').click(function(e){
      e.stopPropagation();
    });
    
    $('body').click(function(){
      hideMenus();
    });
    
    $('body').on('click','.tabControl',function(e){
      $(e.target).closest('.tabsContainer').find('.tabControl').not($(e.target).closest('.tab').find('.tabControl')).removeClass('active');
      $(e.target).closest('.tab').find('.tabControl').addClass('active');
      var thisTab=$(e.target).closest('.tab').find('.tabContent');
      var otherTabs=$(e.target).closest('.tabsContainer').find('.tabContent').not(thisTab);
      if(window.innerWidth>mobileWidth){
        thisTab.attr('style','').addClass('visibleDesktop');
        otherTabs.attr('style','').removeClass('visibleDesktop');
      }
      else{
       thisTab.slideToggle(300, function(){thisTab.removeClass('visibleDesktop');});
       otherTabs.slideUp(300,function(){otherTabs.removeClass('visibleDesktop');});
      }
    });
    
    $(window).on('scroll resize',function(){
      if (window.innerWidth<=mobileWidth){
        if(window.pageYOffset<=$('header').height() && $('.leftMenuContainer').hasClass('scrolled')){
          $('.leftMenuContainer').removeClass('scrolled');
        }
        else if (window.pageYOffset>$('header').height()&&!$('.leftMenuContainer').hasClass('scrolled')){
          $('.leftMenuContainer').addClass('scrolled');
        }
      }
      else if (window.innerWidth<desktopWidth){
        if(window.pageYOffset<$('header').height() && $('.leftMenuContainer').hasClass('scrolled')){
          $('.leftMenuContainer').removeClass('scrolled');
        }
        else if (window.pageYOffset>$('header').height()&&!$('.leftMenuContainer').hasClass('scrolled')){
          $('.leftMenuContainer').addClass('scrolled');
        }
      }
    });
    $('.cms_feedback_form').on('submit',function(e){if($(e.target).find('#tel').val()=='') {
e.preventDefault();
$(e.target).find('#tel').addClass('error').parent().append('<div class="formError">Укажите&nbsp;телефон</div>');
}
});
  });
  