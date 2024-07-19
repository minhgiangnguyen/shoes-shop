<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\products;
use App\Models\options;
use App\Models\product_sizes;
use App\Models\product_images;

class DetailsController extends Controller
{
    function getRowProduct($slug) {
        // $proSize = product_sizes::all();
        // return view("shop/product",['rowProduct'=>$product, 'proSize'=>$proSize]);
        
        $product = products::where('ProductSlug',$slug)->first();
        $images = product_images::where('ProductID',$product->ProductID)->select('ProductImage')->get();
        // $proSizes = product_sizes::where('ProductID',$product->ProductID)->select('SizeID')->get();
        $proSize = product_sizes::all();
        // echo "<pre>";
        // dd($sizes->SizeName);
        // dd(product_images::where('ProductID',$product->ProductID)->select('ProductImage')->get());
        
        return view("shop/product",['rowProduct'=>$product,'images'=>$images,'proSize'=>$proSize]);
    }
    
}