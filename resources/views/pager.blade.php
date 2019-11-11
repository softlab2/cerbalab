@if($ps > 1)
<div class="cmsPager2">
	<?php 
		for($i=1;$i<=$ps;$i++){
	?>
	@if($i == $p)
		<span class="pageslink" style="font-weight: bold;">{{$i}}</span>&nbsp;
	@else
		<a class="pageslink" href="{{URL::current()}}?p={{$i}}">{{$i}}</a>
	@endif
	<?php
		}
	?>
</div>
@endif