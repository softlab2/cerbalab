<?php
    $page = new \StdClass;
    $page->slug = 'zapisatsya';
    $page->title = 'Записаться на прием';
    $page->h1 = 'Записаться на прием';
    $page->keywords = 'Записаться на прием';
    $page->description = 'Записаться на прием';
    //dd($added);
?>
@extends('layouts.app')

@section('content')
<form method="POST" action="/merch">
	@csrf
	<input type="submit" name="123" value="123"/>
</form>

@endsection
