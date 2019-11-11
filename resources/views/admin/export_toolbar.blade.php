@if($view != 'table')
<a href="/admin/products/?view=table&category_id={{$category_id}}"><i class="fa fa-list-ul"></i></a>
@else
<a href="/admin/products/?view=tree&category_id={{$category_id}}"><i class="fa fa-arrows"></i></a>
@endif
&nbsp;|&nbsp;
<div class="btn-group">
	<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">Прайс-лист <span class="caret"></span></button>	
	<ul class="dropdown-menu" role="menu">
		<li><a 	href="/admin/products/?generate=1" 
			onclick="" 
			>
			Сгененрировать
		</a></li>

		<li><a 	href="/price.xls" 
			onclick="" 
			>
			Скачать
		</a></li>

		<li><a 	href="/admin/products/?upload=1" 
			onclick="" 
			>
			Загрузить
		</a></li>
	</ul>
</div>