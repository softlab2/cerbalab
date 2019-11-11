<?php

use Illuminate\Database\Seeder;

class LoadCats extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
     	DB::table('categories')->delete();


        $csvFile = public_path().'/cats.csv';

        if (($handle = fopen($csvFile, 'r')) !== FALSE)
        {
        	$cats = [];
            while (($row = fgetcsv($handle, 10000, ';')) !== FALSE)
            {
            	$cats[$row[0]] = $row;
            }
            fclose($handle);
        }

        ksort($cats);
        foreach ($cats as $row) {
        	$c = new \App\Category;
        	$c->title = $row[1];
        	$c->h1 = $row[1];
        	$c->id = $row[0];
        	$c->parent_id = 0;
        	$c->enabled=1;
        	$c->save();
        }

        foreach ($cats as $row) {
        	$c = \App\Category::find($row[0]);
        	$c->parent_id = $row[2];
        	$c->save();
        }
    }
}
