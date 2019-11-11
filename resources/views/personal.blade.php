<?php
    $page = new \StdClass;
    $page->slug = $personal->slug;
    $page->title = $personal->name;
    $page->h1 = $personal->name;
    $page->keywords = $personal->name;
    $page->description = $personal->name;
?>
@extends('layouts.app')

@section('content')
<article>
    <h1>{{$page->h1}}</h1>
    <div class="info cms_catalog_item product-card" data-tpl="item">
        <ul class="catalogue-goods cmsCatalogItemList">
            <li class="cms_catalog_item" data-tpl="item">
                <div class="doctorImg">
                    @if($personal->image)
                    <img src="{{ ImageManager::getImagePath( public_path().'/'.$personal->image, '200', '250', 'crop') }}" alt=""/>
                    @else
                    <div style="width:200px;height:250px;text-align:center;display:inline-block;border: 1px solid #dae0e7;"><span style="display:inline-block;">Нет фото</span><span style="height:100%;display:inline-block;vertical-align: middle;"></span></div>   
                    @endif
                </div>
                <div class="doctorInfo">
                    <ul class="clinics">
                        @foreach($personal->contacts as $clinic)
                        <li class="clinic">{{$clinic->name}} <span>({{$clinic->address}})</span></li>
                        @endforeach
                    </ul>
                    <div class="mainInfo">
                        <div class="doctorBio">
                            {!! $personal->description !!}
                        </div>
                    </div>
                </div>
                @if($personal->zapis)
                <div class="docButtonContainer"><a href="/zapisatsya/?doctor={{$personal->id}}" class="button blue">Записаться</a></div>
                @endif
                <!--   <div class="docButtonContainer"><div class="docButton">Записаться на прием</div></div>-->
            </li>
        </ul>
    </div>
    @if(0)
    @include('comments')
    @endif
    <script>$("document").ready(function(){$("body").trigger("catalogAfterUpdate");});</script>
</article>

@endsection
