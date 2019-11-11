      <h1 class="h2">Заказ № {{$order->id}}</h1>
      <div class="catalogue-goods-container similar-models">
        <div id="cart_list" class="normal-list">
      <p class="in-total">Заказчик: <strong id="cart_total">{{$order->name}}</strong></p>
      <p class="in-total">Телефон: <strong id="cart_total">{{$order->phone}}</strong></p>
      <p class="in-total">Email: <strong id="cart_total">{{$order->email}}</strong></p>
      <p class="in-total">Способ оплаты: <strong id="cart_total">{{$order->payment->name}}</strong></p>
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
          <td class="name"><a href="http://lm.cerbalab.ru/product/{{$product->slug}}">{{$product->name}}</a></td>
          <td class="time">{{$product->timelength}}</td>
          <td class="price">{{$product->price}} руб.</td>
        </tr>
        @endforeach
      </table>
      <p class="in-total">Общая стоимость услуг: <strong id="cart_total">{{$order->total}} руб</strong></p>
    </div>   

<a href="http://lm.cerbalab.ru/order/{{$order->url}}">Посмотреть заказ</a>