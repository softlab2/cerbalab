<?php
    $page = \App\Page::whereSlug('nashi-specialisty')->first();
?>
@extends('layouts.app')

@section('content')
<article>
<script src="/js/catalogue_paging.js" type="text/javascript"></script>
    <div class="catalogue-goods-container similar-models">  
        <h1>{{$page->h1}}</h1>
        <div class="normal-list">
            {!! $page->content !!}
        </div>
        @foreach(\App\Personal::select('groups')->distinct()->whereEnabled(1)->orderBy('groups')->get() as $group)
        <h2>{{$group->groups}}</h2>
        <ul class="catalogue-goods cmsCatalogItemList">
            @foreach(\App\Personal::whereEnabled(1)->where('groups', $group->groups)->orderBy('position')->get() as $doctor)
            <li class="cms_catalog_item doctors" data-tpl="listItem">
                <div class="doctorImg">
                    @if($doctor->image)
                        <a href="/nashi-specialisty/{{$doctor->slug}}">
                            <img src="{{ ImageManager::getImagePath( public_path().'/'.$doctor->image, '200', '250', 'crop') }}"/>
                        </a>
                    @else
                    <a href="/nashi-specialisty/{{$doctor->slug}}" style="width:200px;height:100%;text-align:center;display:inline-block;border: 1px solid #dae0e7;box-sizing:border-box;"><span style="display:inline-block;">Нет фото</span><span style="height:100%;display:inline-block;vertical-align: middle;"></span></a>
                    @endif
                </div>
                <div class="doctorInfo">
                    <a class="doctorTitle" href="/nashi-specialisty/{{$doctor->slug}}">{{$doctor->name}}</a>
                    <ul class="clinics">
                        @foreach($doctor->contacts as $clinic)
                        <li class="clinic">{{$clinic->name}} <span>({{$clinic->address}})</span></li>
                        @endforeach
                    </ul>
                    <div class="mainInfo">
                        <div class="doctorBio">
                            {!! $doctor->annotation !!}
                        </div>
                    </div>
                </div>
                @if($doctor->zapis)
                <div class="docButtonContainer"><a href="/zapisatsya/?doctor={{$doctor->id}}" class="button blue">Записаться</a></div>
                @endif
            </li>
            @endforeach
        </ul>
        @endforeach
    </div>
</article>

@endsection
