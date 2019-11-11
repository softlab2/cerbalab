<?php

namespace App\Exports;

use App\Product;
//use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ProductsExport implements FromView
{
    // public function collection()
    // {
    //     return Product::all();
    // }
	
	public function view(): View
    {	
    	//dd(\App\Category::get()->toFlatTree()->pluck('title')->toArray());
    	$categories = [];
    	$roots = \App\Category::defaultOrder()->whereIsRoot()->get();
    	foreach ($roots as $root)
    	{
    		$categories[] = $this->makeCategory($root);
   			foreach ($root->children()->defaultOrder()->whereEnabled(1)->get() as $sub){
    			$categories[] = $this->makeCategory($sub);
    			foreach($sub->children()->defaultOrder()->whereEnabled(1)->get() as $sub2){
	    			$categories[] = $this->makeCategory($sub2);
   					foreach($sub2->children()->defaultOrder()->whereEnabled(1)->get() as $sub3){
    					$categories[] = $this->makeCategory($sub3);
    					foreach($sub3->children()->defaultOrder()->whereEnabled(1)->get() as $sub4){
	    					$categories[] = $this->makeCategory($sub4);
	    				}
	    			}
	    		}
	    	}
	    }

        return view('price', [
            'categories' => $categories
        ]);
    }    

    private function makeCategory($c){
		$category = new	\StdClass;
		$category->name = $c->title;
		$category->id = $c->id;
   		$category->products = $c->products()->whereEnabled(1)->orderBy('name')->get();
		return $category;
    }
}