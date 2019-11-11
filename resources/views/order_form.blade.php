  <form class="cms_feedback_form1 " action="/cart" id="" method="post" enctype="multipart/form-data">
		<div class="feedback_forma">  
			<div class="feedback_stroka">   
				<div class="feedback_tit">Фамилия и имя</div>
				<div class=" feedback_pole">
					<input placeholder=""  class="" type="text" name="name" value="@if($order->name){{$order->name}}@else @if(auth()->user()) {{auth()->user()->name}} @endif @endif"/>
				</div>
			</div>
			<div class="feedback_stroka">  
				<div class="feedback_tit">Email</div>
				<div class=" feedback_pole">
					<input placeholder=""  class="required @if ($messages->has('email'))error @endif" type="text" name="email" value="@if($order->email){{$order->email}} @else @if(auth()->user()) {{auth()->user()->email}} @endif @endif"/>
				</div>
		</div>
			<div class="feedback_stroka">  
				<div class="feedback_tit">Контактный телефон</div>
				<div class=" feedback_pole">
					<input placeholder="8 (921) 555-55-55"  class="required @if ($messages->has('phone'))error @endif" type="text" name="phone" value="{{$order->phone}}"/>
				</div>
		</div>
			<div class="feedback_stroka">  
				<div class="feedback_tit">Способ оплаты</div>
				<div class=" feedback_pole">
					<div class="ffselect">
						<select  class="" name="payment_id" style="font-size: 10px; width: 200px;">
							@foreach(\App\Payment::whereEnabled(1)->orderBy('name')->get() as $pay)
							<option value="{{$pay->id}}" @if($pay->id == $order->payment_id)selected @endif>{{$pay->name}}</option>
							@endforeach
						</select>
					</div>
				</div>
			</div>
			@csrf
			<div class="feedback_stroka">  				
				<div class=" feedback_pole">
					<div class="feedback_tit">
						@if(0)<input class="check_order" type="checkbox" name="oferta" value=""/> Ознакомлен и полностью принимаю условия <a target="_blank" href="/oferta"><b>Публичной оферты</b></a>@endif
						<input class="check_order" type="checkbox" name="oferta" value=""/> Ознакомлен и полностью принимаю условия <a target="_blank" href="/oferta.pdf"><b>Публичной оферты</b></a>
					</div>
				</div>
			</div>
			@if(0)
			<div class="feedback_stroka">  				
				<div class=" feedback_pole">
					<div class="feedback_tit">
						<input class="check_order1" type="checkbox" name="policy" value=""/> Ознакомлен и полностью принимаю условия <a href="/policy"><b>Политики конфиденциальности и обработки персональных данных</b></a>
					</div>
				</div>
			</div>
			<div class="feedback_stroka">  				
				<div class=" feedback_pole">
					<div class="feedback_tit">
						<input class="check_order1" type="checkbox" name="personal_data" value=""/> Даю согласие на обработку своих персональных данных и получение информационных сообщений, связанных с оказанием услуг</a>
					</div>
				</div>
			</div>
			@endif
			<div class="feedback_stroka">  
				<div class="feedback_tit"></div>
				<div class="feedback_pole">
					<input id="checkout" type="submit" value="Оформить заказ" class="button " disabled/>
				</div>
			</div>
		</div>
        @foreach($products as $product)     
        <input id="item_{{$product->id}}_hidden" type="hidden" value="{{$product->id}}" name="items[]"/>
        @endforeach
    </form>
