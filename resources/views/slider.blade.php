<section class="mainSlider">
    <link rel="stylesheet" href="/js/nivoslider/themes/default/default.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="/js/nivoslider/nivo-slider.css" type="text/css" media="screen" />
        <div class="slider-wrapper theme-default">
            <div id="slider" class="nivoSlider">
                @foreach($slider->items as $slider_item)
                <img src="{{ ImageManager::getImagePath( public_path().'/'.$slider_item->image, '1024', '450', 'crop') }}" data-thumb="{{ ImageManager::getImagePath( public_path().'/'.$slider_item->image, '1024', '450', 'crop') }}" alt=""  title="#htmlcaption{{$slider_item->id}}"/>
                @endforeach
            </div>
            @foreach($slider->items as $slider_item)
            <div id="htmlcaption{{$slider_item->id}}" class="nivo-html-caption">
                <div style="width: 400px;display: inline-block;">
                    <div class="slideText">
                        <div class="slideHeader">{{$slider_item->title}}</div>
                        <div class="slideContent"  align="left">
                            <span class="slidetextinner">
                                {!! $slider_item->text !!}
                            </span>
                            @if(0)
                            <a href="{{$slider_item->url}}" class="slideLink">{{$slider_item->button_text}}</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>  
    <script type="text/javascript" src="/js/nivoslider/jquery.nivo.slider.js"></script>
    <script type="text/javascript">
        $('#slider').nivoSlider({manualAdvance:false, effect:'slideInRight'});
    </script>
</section>
