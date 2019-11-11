@extends('layouts.app')

@section('content')
<article>
  @include('cart')
       

      <h1 class="h2">{{$page->h1}}</h1>
      <div class="catalogue-goods-container similar-models">
    


        <div class="normal-list"><p><br />
&nbsp;</p></div>            <table class="catalogue-goods cmsCatalogItemList servicesList">
                <tr class="servicesListRow">
                    <th class="servicesListHeader code">Код</th>
                    <th class="servicesListHeader name">Название</th>
                    <th class="servicesListHeader time">Срок,&nbsp;р.д.</th>
                    <th class="servicesListHeader price">Стоимость</th>
                    <th class="servicesListHeader"></th>
                </tr>
        @foreach($products as $product)      
        <tr class="servicesListRow cms_catalog_item" data-tpl="listItem2">
          <td class="code">{{$product->sku}}</td>
          <td class="name"><a href="/product/{{$product->slug}}">{{$product->name}}</a></td>
          <td class="time">{{$product->timelength}}</td>
          <td class="price">{{$product->getPrice()}} руб.</td>
          <td class="servicesListCell">
            <div class="cms_cartbtn_cont">
              <div id="remove_{{$product->id}}"  class="remove button" style="display: @if(\App\Cart::has($product->id))block @else none @endif">
                <a href="#"  id="item_{{$product->id}}" data-id="{{$product->id}}" data-price="{{$product->getPrice()}}" class="removecartbtn">
                  <span class="buyText">Удалить из списка</span>
                </a>
              </div>
              <div id="add_{{$product->id}}" class="buy button" style="display: @if(!\App\Cart::has($product->id))block @else none @endif">
                <a href="#"  id="item_{{$product->id}}" data-id="{{$product->id}}" data-price="{{$product->getPrice()}}" class="addcartbtn">
                  <span class="buyText">Добавить в мой список</span>
                </a>
              </div>
            </div>
          </td>
        </tr>
        @endforeach
                </table>
          <div class="normal-list">          
        @include('pager')
            <p><br />
&nbsp;</p>        </div>        &nbsp;      </div>   
<script>$("document").ready(function(){$(".cmsCatalogItemList").trigger("catalogAfterUpdate");});</script>
      </article>

@endsection
