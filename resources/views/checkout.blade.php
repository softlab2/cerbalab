<?php
    $page = new \StdClass;
    $page->slug = 'order';
    $page->title = 'Заказ № '.$order->id;
    $page->h1 = 'Заказ № '.$order->id;
    $page->keywords = 'Заказ № '.$order->id;
    $page->description = 'Заказ № '.$order->id;

?>
@extends('layouts.app')

@section('content')
<article>
      <h1 class="h2">Заказ № {{$order->id}}</h1>
      <div class="catalogue-goods-container similar-models">
        <div id="cart_list" class="normal-list">
      <table class="catalogue-goods cmsCatalogItemList servicesList">
                <tr class="servicesListRow">
                    <th class="servicesListHeader code">Код</th>
                    <th class="servicesListHeader name">Название</th>
                    <th class="servicesListHeader time">Срок,&nbsp;р.д.</th>
                    <th class="servicesListHeader price">Стоимость</th>
                </tr>
        @foreach($order->items as $item)      
        <?php $product = $item->product; ?>
        <tr class="servicesListRow cms_catalog_item" data-tpl="listItem2">
          <td class="code">{{$product->sku}}</td>
          <td class="name"><a href="/product/{{$product->slug}}">{{$product->name}}</a></td>
          <td class="time">{{$product->timelength}}</td>
          <td class="price">{{$product->price}} руб.</td>
        </tr>
        @endforeach
      </table>
      <p class="in-total">Общая стоимость услуг: <strong id="cart_total">{{$order->total}} руб</strong></p>
    </div>   
<script>$("document").ready(function(){$(".cmsCatalogItemList").trigger("catalogAfterUpdate");});</script>
@if(!$order->paid)
<form class="cms_feedback_form1 " action="{{$order->url}}" id="" method="post" enctype="multipart/form-data">
    <input type="hidden" name="cms_form" value="Y"/>
    <div class="feedback_forma">  
      <div class="feedback_stroka">  
        <div class="feedback_tit">Способ оплаты</div>
        <div class=" feedback_pole">
          <div class="ffselect">
            <select  class="" name="payment_id" style="font-size: 10px; width: 200px;">
              @foreach(\App\Payment::whereEnabled(1)->orderBy('name')->get() as $pay)
              @if(isset($pay->settings['online']))
              @if($pay->settings['online'])
              <option value="{{$pay->id}}" @if($pay->id == $order->payment_id)selected @endif>{{$pay->name}}</option>
              @endif
              @endif
              @endforeach
            </select>
          </div>
        </div>
      </div>
      @csrf
      <input type="hidden" name="order_id" value="{{$order->id}}"/>
      <div class="feedback_stroka">  
        <div class="feedback_tit"></div>
        <div class="feedback_pole">
          <input id="checkout" type="submit" value="Перейти к оплате" class="button blue"/>
        </div>
      </div>
    </div>
  </form>
@else
<div id="cms_fullcart"">  
        <div class="emptyPage">Заказ оплачен</div>
</div>
@endif
      </article>

@endsection
