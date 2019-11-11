<?php
namespace Softlab\Directory\Traits;

use Modules;

trait Moduleable
{
    public function call($module_method, $payload = null){
        $parts = explode('.', $module_method);
        dd( Modules::hasModule($parts[0]) );
    }
}