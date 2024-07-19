<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\products;
use App\Models\genders;
use App\Models\colors;
use App\Models\sizes;
use App\Models\collections;
use App\Models\product_sizes;



class ShopController extends Controller
{
    function getAllProduct() {
        $products = products::select('ProductName','ProductSlug','ProductPrice','ProductThumb')
        ->filter()      
        ->paginate(12);
        return view("shop/category",['products'=>$products]);
    }
    function filterGender(genders $gender) {
        // dd($gender);
        $unisexID = genders::where('GenderName','unisex')->first()->GenderID;
        if(strtolower($gender->GenderName) == 'kids'){
            $products=products::select( 'ProductName','ProductSlug','ProductPrice','ProductThumb')
            ->where('ProductGenderID',$gender->GenderID)
            ->filter()
            ->paginate(12);
            // ->get();  
        }else{
            $products=products::select( 'ProductName','ProductSlug','ProductPrice','ProductThumb')
            ->where('ProductGenderID',$gender->GenderID)
            ->orWhere('ProductGenderID',$unisexID)
            ->filter()
            ->paginate(12);
            // ->get();   
        }
        
            return view("shop/category",['products'=>$products,'gender' => $gender->GenderName]);
              
    }
    function filterCollection(collections $collection) {
        // dd($collection->CollectionName);

        
        $products=products::select( 'ProductName','ProductSlug','ProductPrice','ProductThumb')
        ->where('ProductCollectionID',$collection->CollectionID)
        ->filter()
        ->paginate(12);

        // dd($products);
            return view("shop/category",['products'=>$products,'collection' => $collection->CollectionName]);
              
    }

    
    
    
    
}