<!DOCTYPE html>
<html>
  <head>
    <title>{{$page->title}}</title>
    <meta name="description" content="{{$page->description}}">
    <meta name="keywords" content="{{$page->keywords}}">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width"> 
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/vars.css" type="text/css">
    <link rel="stylesheet" href="/assets/get.css" type="text/css">
    <link rel="stylesheet" href="/assets/styles.css" type="text/css">
    <link rel="stylesheet" href="/assets/js/msgbox/msgbox.css" type="text/css">
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" ></script>
    <script src="/assets/js/jquery/jquery.cookie.js" type="text/javascript" ></script>
    <script src="/assets/js/msgbox/msgbox.js" type="text/javascript" ></script>
    <script src="/assets/js/lea_menuactive.js" type="text/javascript" ></script>
    <script src="/assets/get.js" type="text/javascript" ></script>
    <script src="/assets/js/feedback.js" type="text/javascript"></script>
    <script src="/assets/js/catalogue_cart.js" type="text/javascript"></script>
    <script src="/assets/js/compare.js" type="text/javascript"></script>
    <script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>
    <script charset="utf-8" type="text/javascript" src="https://callback-free.ru/api/js/form-builder.js" data-key="JJyC-ehc"></script>
    <meta name="yandex-verification" content="a1be192a323fada2" />
  </head>
  <body>
    <header> 
        <div class="headerContainer base"> 
            <a href="/" class="logo2"></a> 
            <div class="headerCallbackContainer" style="display:none;"> 
                <div class="button callback white">Обратный звонок</div> 
            </div> 
            <div class="headerRow bordered"> 
                <div class="headerContacts specialMargin"> 
                    <div class="phone">{{settings('phone', '')}}</div> 
                    <a href="mailto:{{settings('email', '')}}" class="email">E-mail: {{settings('email', '')}}</a>
                </div> 
            </div> 
            <div class="headerRow"> 
                <!-- <div class="headerLang"> 
                    <a href="#" class="button lang">RU</a> <a href="#" class="button lang">EN</a> 
                </div> --> 
                <nav class="headerMenuContainer specialMargin"> 
                    <ul class="headerMenu mobileMenu activeMenu"> 
                        <li class="headerMenuItem menuItem">
                            <a href="/">Главная</a>
                        </li> 
                        @foreach(\App\Page::where('enabled',1)->where('main_menu',1)->orderBy('position')->get() as $_page)
                        <li class="headerMenuItem menuItem">
                            <a href="/{{$_page->slug}}">{{$_page->name}}</a>
                        </li> 
                        @endforeach
                    </ul> 
                </nav> 
            </div> 
        </div> 
    </header>
    <main>
        @yield('content')
    </main>
    <footer>
        <div class="footerContainer base">
            <div class="footerBlock pull-left">
                <div class="email">Лицензия ЛО-78-01-007244 от 17.10.2016</div>
            </div>
            <div class="footerBlock pull-right">
                <div class="phone">{{settings('phone', '')}}</div>
                <a href="mailto:life.mc@mail.ru" class="email">E-mail: {{settings('email', '')}}</a>
            </div>
        </div>
    </footer>
  </body>
</html>
