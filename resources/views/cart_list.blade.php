<?php
    $page = new \StdClass;
    $page->slug = 'cart';
    $page->title = 'Корзина';
    $page->h1 = 'Корзина';
    $page->keywords = 'Корзина';
    $page->description = 'Корзина';

    $total = 0;
    $products = [];
    foreach (\App\Cart::items() as $id=>$price) {
      $products[] = \App\Product::find($id);
      $total += $price;
    }
    $products = collect($products);
?>
@extends('layouts.app')

@section('content')
<article>
  @include('cart')
      <h1 class="h2">Мои исследования</h1>
      <div class="catalogue-goods-container similar-models">
        <div id="cart_list" class="normal-list" style="display: @if(count($products)) block @else none @endif">
      <table class="catalogue-goods cmsCatalogItemList servicesList">
                <tr class="servicesListRow">
                    <th class="servicesListHeader code">Код</th>
                    <th class="servicesListHeader name">Название</th>
                    <th class="servicesListHeader time">Срок,&nbsp;р.д.</th>
                    <th class="servicesListHeader price">Стоимость</th>
                    <th class="servicesListHeader"></th>
                </tr>
        @foreach($products as $product)     
        <tr id="tr_{{$product->id}}" class="servicesListRow cms_catalog_item" data-tpl="listItem2">
          <td class="code">{{$product->sku}}</td>
          <td class="name"><a href="/product/{{$product->slug}}">{{$product->name}}</a></td>
          <td class="time">{{$product->timelength}}</td>
          <td class="price">{{$product->getPrice()}} руб.</td>
          <td class="servicesListCell">
            <div class="cms_cartbtn_cont">
              <div id="remove_{{$product->id}}"  class="remove button" style="display: @if(\App\Cart::has($product->id))block @else none @endif">
                <a href="#"  id="item_{{$product->id}}" data-id="{{$product->id}}" data-price="{{$product->getPrice()}}" class="removeitemcartbtn">
                  <span class="buyText">Удалить из списка</span>
                </a>
              </div>
            </div>
          </td>
        </tr>
        @endforeach
      </table>
      <p class="in-total">Общая стоимость услуг: <strong id="cart_total">{{$cart['total']}} руб</strong></p>
      @include('order_form')
    </div>   
      <div id="cms_fullcart" style="display: @if(!count($products)) block @else none @endif">  
        <div class="emptyPage">Исследования не выбраны</div>
      </div>
<script>$("document").ready(function(){$(".cmsCatalogItemList").trigger("catalogAfterUpdate");});</script>
      </article>

@endsection
