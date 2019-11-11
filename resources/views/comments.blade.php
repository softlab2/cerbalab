<div style="@if(!$comment->id)display:none @endif">
    <div class="feedback_success">Спасибо за ваш отзыв. Он появится на сайте после одобрения модератором.</div>
</div>
<div class="reviews">
  <h3>Отзывы</h3>
  @if($product->comments()->approved()->count())
  @foreach($product->comments()->approved()->orderBy('id', 'desc')->get() as $c)
<div class="review_msg">
    {{$c->created_at}} {{$c->name}}</br>
    {{$c->text}}
</div>
  @endforeach
  @else
<div class="review_msg">Пока нет отзывов</div>
@endif

@if(!$comment->id)
</div><h5 class="leaveRev">Оставить отзыв</h5>
<form action="" method="post" class="reviewForm">
    <input type="hidden" name="product_id" value="{{$product->id}}" />
    @csrf
<table>
    <tr>
        <td>Имя:</td>
        <td><input class="required @if ($messages->has('name'))error @endif" name="name" value="@if(!$comment->id){{$comment->name}}@endif"></td>
    </tr>
    <tr>
        <td>Сообщение:</td>
        <td><textarea class="required @if ($messages->has('name'))error @endif" name="message">@if(!$comment->id){{$comment->text}}@endif</textarea></td>

    </tr>
    <tr>
        <td></td><td><input type="submit" value="Отправить" class="send_review button"></td>
    </tr>
</table>
</form>
@else
@endif