@extends('layouts.app')

@section('content')
<article>
  @include('cart')
        <div class="cms_catalog_item" data-tpl="item2">
  
  <div class="h1Container"><h1>{{$product->name}}</h1>
    
  </div>
  <div class="art">Артикул: {{$product->sku}}</div>
  @if($product->actions)
  <?php $action = $product->actions()->first(); ?>
  @if($action)
  <div class="info product-card">
    <div class="doctorImg">
      <img style="width:400px;" src="/{{$action->image}}" alt=""/>
    </div>
    <div class="doctorInfo">
      <div class="mainInfo">
        <div class="doctorBio">{!! $action->description !!}</div>
      </div>
    </div>
  @endif
  @endif
  <div class="serviceInfo">
    <div class="priceBlock"><div><div class="currentPrice">{{$product->getPrice()}} руб.</div>
       <div class="oldPrice">@if($product->old_price){{$product->old_price}} руб. @endif</div>
     </div>
     @if($product->services)
     <div>
        @foreach($product->services as $id=>$value)
        <?php $service = \App\Service::find($id); ?>
        @if($service)
        <div class="dopRow">+ {{$service->name}} - {{$value}}</div>
        @endif
        @endforeach
      </div>        
      @endif
      <div id="add_{{$product->id}}" class="buy button" style="display: @if(!\App\Cart::has($product->id))block @else none @endif">
        <div class="cms_cartbtn_cont">
          <div class="buy button">
            <a href="#"  id="item_{{$product->id}}" data-id="{{$product->id}}" data-price="{{$product->getPrice()}}" class="addcartbtn"  >
              <span class="buyText">Добавить в мой список</span>
            </a>
          </div>
        </div>
      </div>
      <div id="remove_{{$product->id}}" class="buy button" style="display: @if(\App\Cart::has($product->id))block @else none @endif">
        <div class="cms_cartbtn_cont">
          <div class="remove button">
            <a href="#"  id="item_{{$product->id}}" data-id="{{$product->id}}" data-price="{{$product->getPrice()}}" class="removecartbtn"  >
              <span class="buyText">Удалить из списка</span>
            </a>
          </div>
        </div>
      </div>
    </div>

    @if($product->type->name == 'Тест')
    <?php $active = 1; ?>
    <div class="tabsContainer">
      @if($product->annotation || !empty($product->items['target']))
        <?php $active = 0; ?>
        <div class="tab">
          <div class="tabControl active" style="left:10px;">Описание</div>
          <div class="tabContent" style="display:block">
            @if(trim($product->annotation))
            {!! strip_tags($product->annotation) !!}  
            @if(!empty($product->items['target']))
            </br>
            </br>
            <div class="aboutBlock"><b>Показание к исследованию:</b></br>
            @endif                  
            @endif
            @if(!empty($product->items['target']))
            {!! strip_tags($product->items['target']) !!}    
            @if(trim($product->annotation))
            </div>          
            @endif
            @endif
          </div>
        </div>
      @endif
      <?php $items = ['genes', 'srok', 'method']; ?>
      <?php $titles = $product->type->items->pluck('title', 'name')->toArray(); ?>
      @if(!empty($product->items['genes']) || !empty($product->items['srok']) || !empty($product->items['method']))
      <div class="tab">
        <div class="tabControl @if($active)active @endif" style="left:10px;">{{$product->type->desc_tab_title}}</div>
        <div class="tabContent" @if($active)style="display:block;" @endif>
          @foreach($items as $item)
          @if(isset($product->items[$item]))
          @if(trim($product->items[$item]))
          <div class="aboutBlock"><b>{{$titles[$item]}}:</b> </br>{!! strip_tags($product->items[$item]) !!}</div>
          @endif
          @endif
          @endforeach
        </div>
      </div>
      <?php $active = 0; ?>
      @endif
      @if(!empty($product->items['material']) || !empty($product->tabs['prepare']) || !empty($product->pdfs['prepare']))
        <div class="tab">
          <div class="tabControl @if($active)active @endif" style="left:10px;">Подготовка к анализу</div>
          <div class="tabContent"  @if($active)style="display:block;" @endif>
            @if(!empty($product->pdfs['prepare']))
            <a target="_blank" href="/{{$product->pdfs['prepare']}}">Скачать описание подготовки</a>
            @if(0)<img src="/preview_pdf?file={{$product->pdfs['prepare']}}" alt="" />@endif
            @endif
            @if(!empty($product->tabs['prepare']))
            {!! strip_tags($product->tabs['prepare']) !!}    
            </br>
            @endif
            @if(!empty($product->items['material']))
            {!! strip_tags($product->items['material']) !!}    
            @endif
          </div>
        </div>
      <?php $active = 0; ?>
      @endif
      @if(!empty($product->tabs['example']) || !empty($product->pdfs['example']))
        <div class="tab">
          <div class="tabControl @if($active)active @endif" style="left:10px;">Пример интерпретации</div>
          <div class="tabContent"  @if($active)style="display:block;" @endif>
            @if(!empty($product->pdfs['example']))
            <a target="_blank" href="/{{$product->pdfs['example']}}">Скачать интерпретацию</a>
            @if(0)<img src="/preview_pdf?file={{$product->pdfs['example']}}" alt="" />@endif
            @endif
            @if(!empty($product->tabs['example']))
            {!! strip_tags($product->tabs['example']) !!}    
            @endif
          </div>
        </div>
      @endif

      </div>
    </div>
    @else      
    <?php $active = 1; ?>
    <div class="tabsContainer">
      @if($product->annotation)
        <?php $active = 0; ?>
        <div class="tab">
          <div class="tabControl active" style="left:10px;">Описание</div>
          <div class="tabContent" style="display:block">
            @if(trim($product->annotation))
            {!! strip_tags($product->annotation) !!}  
            @endif
          </div>
        </div>
      @endif
      @if(!empty($product->items['doctors']))
        <div class="tab">
          <div class="tabControl @if($active)active @endif" style="left:10px;">Исследование проводится врачами</div>
          <div class="tabContent" style="display:block">
            @if(!empty($product->items['doctors']))
            {!! strip_tags($product->items['doctors']) !!}    
            @endif
          </div>
        </div>
      @endif
      </div>
    </div>
    @endif

    @if(0)
    <div class="tabsContainer">
      @if($product->annotation || 1)
        <div class="tab">
          <div class="tabControl active" style="left:10px;">Описание</div>
          <div class="tabContent" style="display:block">
            @if(trim($product->annotation))
            {!! strip_tags($product->annotation) !!}              
            @else
            <small>описания пока нет</small>
            @endif
          </div>
        </div>
      @endif
      @if($product->type->items)
      <div class="tab">
        <div class="tabControl @if(!$product->annotation)active @endif" style="left:10px;">{{$product->type->desc_tab_title}}</div>
        <div class="tabContent" @if(!$product->annotation)style="display:block;" @endif>
          @foreach($product->type->items as $item)
          @if(isset($product->items[$item->name]))
          @if(trim($product->items[$item->name]))
          <div class="aboutBlock"><b>{{$item->title}}:</b> </br>{!! strip_tags($product->items[$item->name]) !!}</div>
          @endif
          @endif
          @endforeach
        </div>
      </div>
      @endif
      @if($product->type->tabs)
      @foreach($product->type->tabs as $tab)
        @if(isset($product->tabs[$tab->name]))
        <div class="tab">
          <div class="tabControl" style="left:10px;">{{$tab->title}}</div>
          <div class="tabContent">
            {!! $product->tabs[$tab->name] !!}              
          </div>
        </div>
        @endif
      @endforeach
      @endif
      </div>
    </div> 
    @endif

  </div>
  @include('comments')
  
<script>$("document").ready(function(){$("body").trigger("catalogAfterUpdate");});</script>
      </article>
@endsection
