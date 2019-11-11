<table>
    <thead>
    <tr>
        <th></th>
        <th>id</th>
        <th>Артикул</th>
        <th>Наименование</th>
        <th>Срок, р.д.</th>
        <th>Цена</th>
    </tr>
    </thead>
    @foreach($categories as $category)
    <thead>
    <tr>
        <th>c</th>
        <th>{{$category->id}}</th>
        <th colspan="4" style="background-color:#000000; color: #ffffff; text-decoration: bold;">{{$category->name}}</th>
    </tr>
    </thead>
    <tbody>
    @foreach($category->products as $product)
        <tr>
            <td>p</td>
            <td>{{ $product->id }}</td>
            <td>{{ $product->sku }}</td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->timelength }}</td>
            <td>{{ $product->price }}</td>
        </tr>
    @endforeach
    </tbody>
    @endforeach
</table>