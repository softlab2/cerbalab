<?php
if(!function_exists('slider')){
	function slider($slug){
		return view()->first(['slider.'.$slug,'slider'], ['slider'=>\App\Slider::whereSlug($slug)->first()])->render();
	}
}
if(!function_exists('settings')){
	function settings($name,$default){
		$setting = \App\Setting::whereName($name)->first();
		if(!$setting)
			return $default;
		else
			return $setting->value;
	}
}