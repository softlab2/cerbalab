@extends('layouts.app')

@section('content')
<article>
<script src="/js/catalogue_paging.js" type="text/javascript"></script>
    <div class="catalogue-goods-container similar-models">  
        <h1>{{$page->h1}}</h1>
        <div class="normal-list">
            {!! $page->content !!}
        </div>
    </div>
</article>

@endsection
