<?php

use Illuminate\Database\Seeder;

class LoadProds extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
     	DB::table('products')->delete();


        $csvFile = public_path().'/uslugi2.csv';

        if (($handle = fopen($csvFile, 'r')) !== FALSE)
        {
            while (($row = fgetcsv($handle, 10000, ';')) !== FALSE)
            {
            	$p = new \App\Product;
            	$p->id = $row[0];
            	$p->name = $row[8];
            	$p->title = $row[8];
            	$p->h1 = $row[8];
            	$p->price = $row[9];
            	$p->old_price = $row[10];
            	$p->sku = $row[12];
            	$p->enabled = 1;
            	$p->type_id = 2;
            	$p->description = $row[13];
            	if($row[24] && $row[25] )
            		$p->timelength = 'от '.$row[24].' до '.$row[25];
            	$p->save();
            	$p->categories()->attach([$row[5]]);
            }
            fclose($handle);
        }

        $csvFile = public_path().'/test4.csv';

        if (($handle = fopen($csvFile, 'r')) !== FALSE)
        {
        	$i=1;
            while (($row = fgetcsv($handle, 10000, ';')) !== FALSE)
            {
            	echo $i."\n";
            	$i++;
            	//PERowID,Title,Price,Price_old,Srok_ot,Srok_do,Artic
            	$p = new \App\Product;
            	//$p->id = $row[0];
            	$p->name = $row[1];
            	$p->title = $row[1];
            	$p->h1 = $row[1];
            	$p->price = $row[2];
            	$p->old_price = $row[3];
            	$p->sku = $row[6];
            	$p->enabled = 1;
            	$p->type_id = 1;
//            	$p->description = $row[13];
            	if($row[4] && $row[5] )
            		$p->timelength = 'от '.$row[4].' до '.$row[5];
            	elseif($row[4])
            		$p->timelength = $row[5];
            	elseif($row[5])
            		$p->timelength = $row[5];
            	$p->save();
            	$p->categories()->attach([$row[0]]);
            }
            fclose($handle);
        }

    }
}
