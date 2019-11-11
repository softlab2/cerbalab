<?php

use Illuminate\Database\Seeder;

class LoadE9 extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $e9 = DB::table('Entity_9')
    	    ->get();
    	foreach($e9 as $e){
    	    if($p = \App\Product::whereSku($e->Artic)->first()){
    		echo $e->Gen;
    		$p->annotation = $e->Gen;
    		$p->save();
    		
    	    }
    	}
    }
}
