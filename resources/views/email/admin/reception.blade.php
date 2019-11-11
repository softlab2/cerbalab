      <h1 class="h2">Новая запись на прем № {{$reception->id}}</h1>
      <div class="catalogue-goods-container similar-models">
        <div id="cart_list" class="normal-list">
      <p class="in-total">Заказчик: <strong id="cart_total">{{$reception->name}}</strong></p>
      <p class="in-total">Телефон: <strong id="cart_total">{{$reception->phone}}</strong></p>
      <p class="in-total">Время приема: <strong id="cart_total">{{$reception->reception_time}}</strong></p>
      <p class="in-total">Врач: <strong id="cart_total">@if($reception->personal){{$reception->personal->name}}@else любой @endif</strong></p>
      <p class="in-total">Описание: <strong id="cart_total">{{$reception->description}}</strong></p>
    </div>   

