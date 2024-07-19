<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\products;
use App\Models\collections;
use App\Models\orderdetails;
use App\Models\product_sizes;
use DB;
class HomeController extends Controller
{
    function index() {   
        $newProducts=products::select('ProductName','ProductSlug','ProductPrice','ProductThumb')->orderBy('ProductID','desc')->limit(8)->get();  
        $headerBanner=collections::select('CollectionName','CollectionImage','CollectionTitle','CollectionSummary')
                                ->where('ImageType',1)->first();
        $otherBanner=collections::select('CollectionName','CollectionImage','CollectionTitle','CollectionSummary')
                                ->where('ImageType',2)->first();
        $collectList=collections::select('CollectionName','CollectionImage','CollectionTitle','CollectionSummary')
                    ->where('ImageType',0)->limit(4)->get();
        $newCollectID=collections::orderBy('CollectionID','desc')->first()->CollectionID;
        $newCollectName=collections::orderBy('CollectionID','desc')->first()->CollectionName;
        $newCollect=products::select('ProductName','ProductSlug','ProductPrice','ProductThumb')->where('ProductCollectionID',$newCollectID)->limit(8)->get();
        // dd($collectList);
        $IdtopSeller=orderdetails::select(DB::raw('SUM(DetailQuantity) as total_qtt'),'DetailProductID')
        ->groupBy('DetailProductID')->orderBy('total_qtt','DESC')->get()->pluck('DetailProductID');
        $topSeller = products::whereIn('ProductID', $IdtopSeller)->limit(6)->get();


// dd($product);
        return view("home/index",compact('newProducts','newCollectName','newCollect','headerBanner','otherBanner','collectList','topSeller'));
    }
    
}