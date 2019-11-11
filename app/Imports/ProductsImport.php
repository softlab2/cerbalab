<?php
namespace App\Imports;

use App\Product;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class ProductsImport implements ToCollection
{
    public function collection(Collection $rows)
    {
        
        $currentCategoryId = null;
        $currentProduct = null;
        foreach ($rows as $row) 
        {
        	if($row[0] == 'c'){
        		if($row[1]){
        			$currentCategoryId = $row[1];
        			$c = \App\Category::find($row[1]);
        			if($c){
        				if($c->title != $row[2]){
        					$c->title = $row[2];	
        					$c->save();
        				}
        			}
        		}else{
        			$currentCategoryId = $row[1];
        			$c = new \App\Category;
       				$c->title = $this->mb_ucfirst( mb_strtolower($row[2]) );
       				$c->h1 = $row[2];
       				$c->keywords = $row[2];
       				$c->description = $row[2];
       				$c->enabled = 1;
       				$c->parent_id = $currentCategoryId;
       				$c->save();
       				$currentCategoryId = $c->id;
        		}
                $currentProduct = null;
        	}
        	elseif($row[0] == 't' || $row[0] == 'u' ){
        		if($p = \App\Product::find($row[1])){
    				if($p->sku != $row[4] || $p->name != $row[2] || $p->timelength != $row[5] || $p->price != $row[3]){
    					$p->sku = $row[4];
        				$p->name = substr($row[2],0,255);
        				$p->timelength = $row[5];
    					$p->price = $row[3];
    					$p->save();
    				}
        		}else{
                    $name = $row[2];
                    $annotation = '';

                    $parts = explode("\n", $name);
                    $name = $this->mb_ucfirst( mb_strtolower($parts[0]) );
                    unset($parts[0]);
                    $annotation = implode(' ', $parts);

        			$p = new \App\Product;
    				$p->sku = $row[4];
                    $p->name = $name;
                    $p->annotation = $annotation;
    				$p->h1 = $name;
    				$p->title = $name;
    				$p->timelength = $row[5];
    				$p->price = $row[3];
       				$p->enabled = 1;
                    if($row[0] == 't')
       				 $p->type_id=1;
                    else
                     $p->type_id=2;
    				$p->save();
    				$p->categories()->attach([$currentCategoryId]);
                    $currentProduct = $p;
        		}
            }elseif($row[0] == 'd'){
                if($currentProduct){
                    $currentProduct->annotation = $row[2];
                    $currentProduct->save();
                }

                $currentProduct = null;
        	}else{

        	}
        }
    }

    private function mb_ucfirst($text) {
    return mb_strtoupper(mb_substr($text, 0, 1)) . mb_substr($text, 1);
}
}