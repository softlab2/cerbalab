@extends('layouts.home')

@section('content')
{!! slider('main') !!}
<?php $slider = \App\Slider::whereSlug('rombs')->first(); $i=1;?>
<style type="text/css">
.romb{
    display: inline-block;
    padding-right: 60px;
    padding-left: 10px;
    padding-bottom: 10px;
}
</style>
<?php $slider = \App\Slider::whereSlug('rombs')->first(); $i=1;?>
<div class="container" style="margin-top: 0px; height: 264.6px;">
@foreach($slider->items as $slider_item)
    @if(0)
    <li class="romb">
          <a href="{{$slider_item->url}}"><img height="{{$slider->height}}" src="{{$slider_item->image}}" alt="{{$slider_item->title}}"></a>
    </li>    
    @endif
    <div class="card col-md-4">
        <img height="{{$slider->height}}" src="{{$slider_item->image}}" alt="{{$slider_item->title}}"/>
        <div class="card-body">
            <h5 class="card-title"><a href="{{$slider_item->url}}">{{$slider_item->title}}</a></h5>
        </div>
    </div>
@endforeach
</div>

<div class="textBlock">

<div class="blockContent base">
<h2><b>СЕРБАЛАБ</b></h2>
Это медико-генетический центр, основой которого являются - качественная диагностика и компетентное генетическое консультирование.
</br>
</br>
Наша команда - это опытные врачи, специализирующиеся как на клинической, так и на лабораторной генетике, высококвалифицированные биологи, уникальные биоинформатики;  профессионалы, выполняющие более 5000 наименований генетических тестов с использованием самых высоких технологий; от цитогенетических и иммуногистохимических до микроматричного анализа и секвенирования NGS.
</br>
</br>

Наша лаборатория является объединяющей платформой для генетического консультирования, генетических исследований, научно-исследовательской деятельности и образовательной практики. Вдумчиво и осознанно разбираться в каждой проблеме ради приумножения здоровья и продолжения жизней - наша ежедневная миссия!
</div>
</div>

<div class="clearfix textBlock_ramka">

<div class="blockContent base">
<h2><b>ГЕНЕТИЧЕСКОЕ КОНСУЛЬТИРОВАНИЕ</b></h2>
Любое генетическое исследование вне зависимости от задачи должно сопровождается генетическим консультированием
</br>
</br>

Генетическое консультирование это:
</br>
</br>

1. Выявление необходимости в генетическом исследовании, сбор анамнеза и составление родословной;
</br>
2. Помощь в  выборе оптимального генетического исследования, метода;  последующая интерпретация результатов врачом;
</br>
3. Оценка готовности пациента к генетическому тестированию, принятию  генетической информации;
</br>
4. Психосоциальное сопровождение и адаптация к полученной генетической информации.
</br>
</div>
</div>
<div class="base" id="map" style="height:450px;    margin: 20px 0 40px 0;">&nbsp;</div>
<script type="text/javascript">
  ymaps.ready(init);
    var myMap;

    function init(){     
        myMap = new ymaps.Map ("map", {
            center: [59.965650, 30.305995],
            zoom: 11,
            controls: []
        },
        {suppressMapOpenBlock: true}),
        balloonLayout = ymaps.templateLayoutFactory.createClass('<div class="my-balloon">$[properties.balloonContent]</div>');


        var marker1=new ymaps.Placemark([60.007182, 30.295126], {
            balloonContent: '<div class="my-balloon_zhizn"><table class="simple"><tbody><tr><th colspan="2">МГЦ «ЖИЗНЬ»</th></tr><tr><td colspan="2">тел. +7 921 947 65 38</td></tr><tr><td colspan="2">Коломяжский пр., 28</td></tr><tr class="mHide"><td colspan="2">м. Пионерская</td></tr><tr class="mHide"><td colspan="2">Часы работы:</td></tr><tr class="mHide"><td>пн.</td><td>9-19</td></tr><tr class="mHide"><td>вт.</td><td>9-19</td></tr><tr class="mHide"><td>ср.</td><td>9-19</td></tr><tr class="mHide"><td>чт.</td><td>9-19</td></tr><tr class="mHide"><td>пт.</td><td>9-19</td></tr><tr class="mHide"><td>сб.</td><td>10-16</td></tr><tr class="mHide"><td>вс.</td><td>выходной</td></tr></tbody></table></div>',
            iconContent: '<span class="iconContent"><span>МГЦ «ЖИЗНЬ»</span></span>',
//          balloonContentHeader:"999999999999999999999999999999999999999999999999999999"
        }, {
            // Зададим произвольный макет метки.
            balloonLayout:balloonLayout,
            // Не скрываем иконку при открытом балуне.
            hideIconOnBalloonOpen: false,
            // И дополнительно смещаем балун, для открытия над иконкой.
            balloonOffset: [-218, -150],
            iconLayout: 'default#imageWithContent',
            iconImageHref: '/img/icon1.png',
            iconImageSize: [160, 43],
            iconImageOffset: [-18, -43],
//          balloonContentHeader:"999999999999999999999999999999999999999999999999999999"
        });
        myMap.geoObjects.add(marker1);
        
        marker1.events.add('mouseenter', function (e) {

            e.get('target').options.set('iconImageHref', '/img/iconHover1.png'); 

        });
        
        marker1.events.add('mouseleave', function (e) {

            e.get('target').options.set('iconImageHref', '/img/icon1.png'); 

        });
        var marker2=new ymaps.Placemark([59.928807, 30.249312], {
            balloonContent: '<div class="my-balloon_serbalab"><table class="simple"><tbody><tr><th colspan="2">МГЦ «СЕРБАЛАБ»</th></tr><tr><td colspan="2">тел. +7 812 602 93 38</td></tr><tr><td colspan="2">Большой пр. В. О., 90, к. 2</td></tr><tr class="mHide"><td colspan="2">м. Василеостровская, Приморская</td></tr><tr class="mHide"><td colspan="2">Часы работы:</td></tr><tr class="mHide"><td>пн.</td><td>9-19</td></tr><tr class="mHide"><td>вт.</td><td>9-19</td></tr><tr class="mHide"><td>ср.</td><td>9-19</td></tr><tr class="mHide"><td>чт.</td><td>9-19</td></tr><tr class="mHide"><td>пт.</td><td>9-19</td></tr><tr class="mHide"><td>сб.</td><td>10-16</td></tr><tr class="mHide"><td>вс.</td><td>выходной</td></tr></tbody></table></div>',
            iconContent: '<span class="iconContent"><span>МГЦ «СЕРБАЛАБ»</span></span>'
        }, {
            // Зададим произвольный макет метки.
            balloonLayout:balloonLayout,
            // Не скрываем иконку при открытом балуне.
            hideIconOnBalloonOpen: false,
            // И дополнительно смещаем балун, для открытия над иконкой.
            balloonOffset: [-218, -150],
            iconLayout: 'default#imageWithContent',
            iconImageHref: '/img/icon2.png',
            iconImageSize: [180, 43],
            iconImageOffset: [-18, -43],
        });
        myMap.geoObjects.add(marker2);
        
        
        marker2.events.add('mouseenter', function (e) {

            e.get('target').options.set('iconImageHref', '/img/iconHover2.png'); 

        });
        
        marker2.events.add('mouseleave', function (e) {

            e.get('target').options.set('iconImageHref', '/img/icon2.png'); 

        });
        
        var marker3=new ymaps.Placemark([59.967331, 30.384041], {
            balloonContent: '<div class="my-balloon_biogarmonia"><table class="simple"><tbody><tr><th colspan="2">МГЦ «БИОГАРМОНИЯ»</th></tr><tr><td colspan="2">тел. +7 812 643 66 77</td></tr><tr><td colspan="2">Кондратьевский пр., 23</td></tr><tr class="mHide"><td colspan="2">м. Выборгская, Площадь Ленина</td></tr><tr class="mHide"><td colspan="2">Часы работы:</td></tr><tr class="mHide"><td>пн.</td><td>9-18</td></tr><tr class="mHide"><td>вт.</td><td>9-18</td></tr><tr class="mHide"><td>ср.</td><td>9-18</td></tr><tr class="mHide"><td>чт.</td><td>9-18</td></tr><tr class="mHide"><td>пт.</td><td>9-18</td></tr><tr class="mHide"><td>сб.</td><td>11-14</td></tr><tr class="mHide"><td>вс.</td><td>выходной</td></tr></tbody></table></div>',
            iconContent: '<span class="iconContent"><span>МГЦ «БИОГАРМОНИЯ»</span></span>'
        }, {
            // Зададим произвольный макет метки.
            balloonLayout:balloonLayout,
            // Не скрываем иконку при открытом балуне.
            hideIconOnBalloonOpen: false,
            // И дополнительно смещаем балун, для открытия над иконкой.
            balloonOffset: [18, -150],
            iconLayout: 'default#imageWithContent',
            iconImageHref: '/img/icon3.png',
            iconImageSize: [210, 43],
            iconImageOffset: [-18, -43],
        });
        
        myMap.geoObjects.add(marker3);
        
        marker3.events.add('mouseenter', function (e) {

            e.get('target').options.set('iconImageHref', '/img/iconHover3.png'); 

        });
        
        marker3.events.add('mouseleave', function (e) {

            e.get('target').options.set('iconImageHref', '/img/icon3.png'); 

        });
    }
</script>    
@endsection

@if(0)
<div class="container" style="height: 264.6px;"><a class="hex hex1 diagnostic" href="/cat/price_med_test/womens_health/kariotipirovanie/"><span class="inner">Кариотипирование</span><span class="corner-1"> </span><span class="corner-2"> </span></a><a class="hex hex2 diagnostic" href="/cat/price_med_test/womens_health/kompleksnoe_obsledovanie_pri/"><span class="inner">Комплексное обследование при неразвивающейся беременности</span><span class="corner-1"> </span><span class="corner-2"> </span></a><a class="hex hex3 diagnostic" href="/cat/price_med_test/womens_health/neinvazivnaya_prenatalnaya_diagnostika/"><span class="inner">Неинвазивная пренатальная диагностика</span><span class="corner-1"> </span><span class="corner-2"> </span></a><a class="hex hex4 diagnostic" href="/cat/price_med_test/Beauty_and_Health/geneticheskie_pasporta/"><span class="inner">Генетические паспорта</span><span class="corner-1"> </span><span class="corner-2"> </span></a><a class="hex hex5 diagnostic" href="/cat/price_med_test/oncology/predraspolozhennosti_k_onkologicheskim/"><span class="inner">Предрасположенность к онкологическим заболеваниям</span><span class="corner-1"> </span><span class="corner-2"> </span></a><a class="hex hex6 diagnostic" href="/cat/price_med_test/Hereditary_diseases/diagnostika_nz_metodom_ngs/"><span class="inner">Диагностика наследственных заболеваний методом NGS</span><span class="corner-1"> </span><span class="corner-2"> </span></a></div>
@endif