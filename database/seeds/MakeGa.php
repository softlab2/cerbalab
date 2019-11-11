<?php

use Illuminate\Database\Seeder;

class MakeGa extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $c = \App\Category::find(373);
        foreach ($c->sub as $cat) {
        	foreach($cat->products as $p){
        		$p->name = str_replace($cat->title.', ', $cat->title.'. ', $p->name);
        		//$p->name = $cat->title.', '.$p->name;
        		$p->title = $p->name;
        		$p->h1 = $p->name;
        		$p->save();
        	}
        	echo $cat->title;
        }
    }
}
