<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\colors;
use App\Models\genders;
use App\Models\sizes;
use App\Models\collections;

class CategoryController extends Controller
{
    function homeCat()
    {
        $dataColec = collections::orderBy('CollectionID','DESC')->get();
        $dataGender = genders::orderBy('GenderID','DESC')->get();
        $dataSize = sizes::orderBy('SizeID','DESC')->get();
        $dataColor = colors::orderBy('ColorID','DESC')->get();
        return view('admin/category/category', compact('dataColec', 'dataGender', 'dataSize', 'dataColor'));
    }
    function addCat(Request $request)
    {
        // dd($request);
        $request->validate([
            'CollectionName' => 'required|unique:collections',
            'CollectionImage' => 'required',
            'ImageType' => 'required'
        ]);
        $addCat = new collections();
        $addCat->CollectionName = $request->input('CollectionName');
        
        if ($request->hasFile('CollectionImage')) {
            $file = $request->file('CollectionImage');
            $path = public_path('assets/img/collection');
            $filename  = $file->getClientOriginalName();
            $file->move($path, $filename);
            $data = array_merge($request->all(), ['CollectionImage' => "assets/img/collection/" . $filename]);
        // dd($data);
            $addCat->fill($data);
        }
        $addCat->CollectionTitle = $request->input('CollectionTitle');
        $addCat->CollectionSummary = $request->input('CollectionSummary');
        $addCat->ImageType = $request->input('ImageType');
        $addCat->save();
        return back()->with('success', "Successfully!");
    }
    function deleteCat($id)
    {
        $delCat = collections::find($id);
        if($delCat->products->count() == 0){
            $delCat->delete();
            return back()->with('success', "Successfully!");
        }else{
            return back()->with('danger', "The category currently has products, cannot be deleted!");
        }
    }
    //quan ly gender
    function addGender(Request $request)
    {
        $request->validate([
            'GenderName' => 'required|unique:genders'
        ]);
        $Gender = new genders();
        $Gender->GenderName = $request->input('GenderName');
        $Gender->save();
        return back()->with('success', "Successfully!");
    }
    function delGender($id)
    {
        $delGender = genders::find($id);
        if($delGender->productGender->count() == 0){
            $delGender->delete();
            return back()->with('success', "Successfully!");
        }else{
            return back()->with('danger', "The category currently has products, cannot be deleted!");
        }
    }
    //quan ly size
    function addSize(Request $request)
    {
        $request->validate([
            'SizeName' => 'required|unique:sizes'
        ]);
        $Size = new sizes();
        $Size->SizeName = $request->input('SizeName');
        $Size->save();
        return back()->with('success', "Successfully!");
    }
    function delSize($id)
    {
        $delSize = sizes::find($id);
        if($delSize->productSize->count() == 0){
            $delSize->delete();
            return back()->with('success', "Successfully!");
        }else{
            return back()->with('danger', "The category currently has products, cannot be deleted!");
        }
    }
    //quan ly color
    function addColor(Request $request)
    {
        $request->validate([
            'ColorName' => 'required|unique:colors'
        ]);
        $Color = new colors();
        $Color->ColorName = $request->input('ColorName');
        $Color->save();
        return back()->with('success', "Successfully!");
    }
    function delColor($id)
    {
        $delColor = colors::find($id);
        if($delColor->productColor->count() == 0){
            $delColor->delete();
            return back()->with('success', "Successfully!");
        }else{
            return back()->with('danger', "The category currently has products, cannot be deleted!");
        }
        
    }
}