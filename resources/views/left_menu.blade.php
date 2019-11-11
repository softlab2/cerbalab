<?php
	if(!isset($cids))
		$cids = [];
?>
<nav class="leftMenuContainer">
	<div class="leftMenuInnerContainer">
		<div id="search">
			<form class="searchform" method="post" action="/search"> 
				@csrf
				<input type="text" class="searchfield" value="" name="query" size="10" /> 
				<input type="submit" class="searchbutton" value="" /> 
			</form> 
		</div>
		@foreach(\App\Category::defaultOrder()->where('enabled',1)->get()->toTree() as $menu)
		<div class="leftMenuTitle">{{$menu->title}}</div>
		<ol class="leftMenu activeMenu">
		@foreach($menu->children as $leftMenu)
			<li class="leftMenuItem @if(in_array($leftMenu->id, $cids))open active @endif">
				@if(count($leftMenu->children))
				<span class="itemText">{{$leftMenu->title}}</span>
				<ol class="leftSubMenu" style="display:@if(in_array($leftMenu->id, $cids))block @else none @endif ;">
					@foreach($leftMenu->children as $leftSubMenuItem)
					<li class="leftSubMenuItem">
						<a href="/products/{{$leftSubMenuItem->slug}}" class="">{{$leftSubMenuItem->title}}</a>
					</li>
					@endforeach
				</ol>
				@else
				<a href="/products/{{$leftMenu->slug}}">{{$leftMenu->title}}</a>
				@endif
			</li>
		@endforeach
		</ol>
		@endforeach
	</div>
</nav>