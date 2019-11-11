@extends('layouts.app')

@section('content')

<?php
    $page = new \StdClass;
    $page->slug = 'zapisatsya';
    $page->title = 'Записаться на прием';
    $page->h1 = 'Записаться на прием';
    $page->keywords = 'Записаться на прием';
    $page->description = 'Записаться на прием';
    //dd($added);
?>
<article>
    <h1>Записаться на прием</h1>
	<form class="cms_feedback_form1 " action="/zapisatsya_" id="" method="post" enctype="multipart/form-data">
		<input type="hidden" name="cms_form" value="Y"/>
		<div style="@if(!$reception->id)display:none @endif">
			<div class="feedback_success">Заявка успешно отправлена</div>
		</div>
		<div class="feedback_forma">  
			<div class="feedback_stroka">  
				<div class="feedback_tit">Фамилия и имя</div>
				<div class=" feedback_pole">
					<input placeholder=""  class="" type="text" name="name" value="{{ $reception->name }}"/>
				</div>
			</div>
			<div class="feedback_stroka">  
				<div class="feedback_tit">Врач</div>
				<div class=" feedback_pole">
					<div class="ffselect">
						<select  class="" name="personal_id" style="font-size: 10px; width: 200px;">
							<option value="0" @if(!$personal_id)selected='selected' @endif>Любой</option>
							@foreach(\App\Personal::whereEnabled(1)->whereZapis(1)->orderBy('name')->get() as $doc)
							<option @if($doc->id == $personal_id)selected="selected" @endif value="{{$doc->id}}">{{$doc->name}}</option>
							@endforeach
						</select>
					</div>
				</div>
			</div>
			<div class="feedback_stroka">  
				<div class="feedback_tit">Контактный телефон</div>
				<div class=" feedback_pole">
					<input placeholder="8 (921) 555-55-55"  class="required @if ($messages->has('phone'))error @endif" type="text" name="phone" value="{{$reception->phone}}"/>
	                @if ($messages->has('phone'))
	                <span class="formError" role="alert">
	                    <strong>Укажите телефон</strong>
	                </span>
	                @endif
				</div>
		</div>
			<div class="feedback_stroka">  
				<div class="feedback_tit">Предпочтительное время приема</div>
				<div class=" feedback_pole">
					<input placeholder="Вторник, утро"  class="" type="text" name="reception_time" value="{{$reception->reception_time}}"/>
				</div>
			</div>
			<div class="feedback_stroka">  
				<div class="feedback_tit">Сообщение</div>
				<div class=" feedback_pole">
					<textarea placeholder=""  class="" name="description">{{$reception->description}}</textarea>
				</div>
			</div>
			@csrf
			<div class="feedback_stroka">  
				<div class="feedback_tit"></div>
				<div class="feedback_pole">
					<input type="submit" value="Отправить" class="button blue" />
				</div>
			</div>
		</div>
	</form>
</article>
@endsection
