<?php

use Illuminate\Database\Seeder;

class G3 extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $c = \App\Category::find(373);
        foreach ($c->categories as $cat) {
        	echo $cat->title;
        }
    }
}
