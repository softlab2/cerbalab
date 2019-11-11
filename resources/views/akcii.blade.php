<?php
    $page = \App\Page::whereSlug('akcii')->first();
?>
@extends('layouts.app')

@section('content')
<article>
    <h1 class="h2">Акции</h1>
    @foreach(\App\Action::whereEnabled(1)->get() as $action)
    <a href="/product/{{$action->products()->first()->slug}}">
    <div style="display:block">
    <h2>{{$action->name}}</h2>
        <span class="doctorImg " style="display:block">
            @if($action->discount)<span class="discount">-{{$action->discount}}%</span>@endif
            <img src="{{$action->image}}" style="width:600px" alt="" />
        </span>
    <div style="display:block">    
    {!! $action->description !!}
    <hr>
    </div>
    </div>
    </a>
    @endforeach
</article>

@endsection
