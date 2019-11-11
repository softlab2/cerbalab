<label>Прайс</label>
<form action="/admin/upload_price" method="post" enctype="multipart/form-data">
	@csrf
    Файл: <input class="" name="price" type="file" />
    	  <input type="checkbox" name="deleteall" /> Удалить данные перед загрузкой
          <input class="btn btn-success" type="submit" name="submitBtn" value="Загрузить" />
</form>
<hr>
<label>Шаблон <a href="/price_tpl.xls">скачать</a></label>
<form action="/admin/upload_tpl" method="post" enctype="multipart/form-data">
	@csrf
    Файл: <input class="" name="tpl" type="file" />
    
          <input class="btn btn-success" type="submit" name="submitBtn" value="Загрузить шаблон" />
</form>