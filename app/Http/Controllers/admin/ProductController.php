<?php

namespace App\Http\Controllers\admin;

use App\Models\sizes;
use App\Models\colors;
use App\Models\orders;
use App\Models\genders;
use App\Models\products;
use App\Models\shipping;
use App\Models\collections;
use Illuminate\Support\Str;
use App\Models\orderdetails;
use Illuminate\Http\Request;
use App\Models\product_sizes;
use App\Models\product_images;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    
    function index(){
        $data = collections::all();
        $gender = genders::all();
        $color = colors::all();
        $size = sizes::all();
        return view('admin/product/addProduct', compact('data', 'gender', 'color', 'size'));
    }

    function addProduct(ProductRequest $request)
    {
        $addPro = $request->only('ProductCode','ProductName','ProductGenderID','ProductColorID',
        'ProductPrice','ProductDesc','ProductDetail','ProductCollectionID','ProductMaterial','ProductColorDetail');
        if ($request->hasFile('ProductThumb')) {
            $file = $request->file('ProductThumb');
            $path = public_path('/assets/img/products/'.$request->ProductCode);
            $path = public_path('/assets/img/products/'.$request->ProductCode);

            $filename = "assets/img/products/$request->ProductCode/" .$file->getClientOriginalName();
            $file->move($path, $filename);
            $addPro['ProductThumb'] = $filename;
        }
        $addPro['ProductSlug'] = Str::slug($request->ProductName);
        // dd($addPro);
        $addPro = products::create($addPro);

        //luu vao product_images
        $img_list = json_decode($request->input('ProductImage'));//Chuyển chuỗi -> thành mảng
        $imageID = $addPro->ProductID;
        if (is_array($img_list)) {
            foreach ($img_list as $key) { //duyệt N phần tử mảng
                $img = new product_images(); //mỗi lần lặp khởi tạo image 1 lần
                $img->ProductID = $imageID;
                $rpl = str_replace(url('') . '/', '', $key);
                $img->ProductImage = $rpl;
                $img->save();
            }
        } else {
            $img = new product_images();
            $img->ProductID = $imageID;
            $rpl = str_replace(url('') . '/', '', $request->ProductImage);
            $img->ProductImage = $rpl;
            $img->save();
        }
        $productOptionID = $addPro->ProductID;
        //Lưu vào Bảng productsize
        $arr = $request->input('size');
        foreach ($arr as $val) {
            $Size = new product_sizes();
            $Size->ProductID = $productOptionID;
            $Size->SizeID = $val;
            $Size->save();
        }
        return redirect()->back()->with('success', "Successfully!");
    }
    //list Product
    function listPro()
    {
        $keyword = request('keyword');
        $data = products::orderBy('ProductID','DESC')->paginate(5);
        // dd($data);
        if($keyword){
            $data = products::orderBy('ProductID','DESC')
            ->where('ProductCode','LIKE','%'.$keyword.'%')
            ->paginate(5);
        }
        return view('admin/product/listProducts', compact('data'));
    }

    //edit Product
    function edit($id)
    {
        // dd($id);
        $dataPro = products::find($id);
        $data = collections::all();
        $gender = genders::all();
        $color = colors::all();
        return view('admin/product/editProduct', compact('data', 'dataPro', 'gender', 'color'));
    }
    function editPro(Request $request ,$id)
    {
        
        // $request->validate([
        //     'ProductName' => 'unique:products,ProductName,'.$id,
        // ]);
        $editPro = $request->only('ProductCode','ProductName','ProductGenderID','ProductColorID',
        'ProductPrice','ProductDesc','ProductDetail','ProductCollectionID','ProductMaterial','ProductColorDetail');
        if ($request->hasFile('ProductThumb')) {
            $file = $request->file('ProductThumb');
            $path = public_path('/assets/img/products/'.$request->ProductCode);
            $filename = "assets/img/products/$request->ProductCode/" .$file->getClientOriginalName();
            $file->move($path, $filename);
            $editPro['ProductThumb'] = $filename;
        }
        $editPro['ProductSlug'] = Str::slug($request->ProductName);
        products::find($id)->update($editPro);
        return redirect()->back()->with('success', "Successfully!");
    }
    //delete
    function delete($id)
    {
        $del = products::find($id);
        $del->delete();
        return back()->with('success', "Successfully!");
    }
    //Recycle Bin Index
    function recycleBin(){
        $trasheds = products::onlyTrashed()->get();
        // dd($trasheds);
        return view('admin/product/RecycleBin', compact('trasheds'));
    }
    //Restore
    function restore($id){
        $trasheds = products::withTrashed()->find($id);
        // dd($trasheds);
        $trasheds->restore();
        return back()->with('success', "Successfully!");
    }
    //Empty Recycle Bin 
    function deleteAll(Request $req){
        $trasheds = $req->ids;
        if(empty($trasheds)){
            return back()->with('success', "Not selected yet!");
        }
        products::withTrashed()->whereIn('ProductID',$trasheds)->forceDelete();
        product_sizes::whereIn('ProductID',$trasheds)->Delete();
        // dd($trasheds);
        return back()->with('success', "Successfully!");
    }

    //quan ly anh
    function img_list(Request $request, $id)
    {
        if($request->isMethod('GET')){
            $data = products::find($id);
            $img = product_images::all();
            return view('admin/product/productImage', compact('img', 'data'));
        }
        if($request->isMethod('POST')){
            $request->validate([
                'image_list' => 'required|mimes:jpeg,png,jpg'
            ]);
            $data = products::find($id);
            if ($request->hasFile('image_list')) {
                $file = $request->file('image_list');
                $path = public_path('/assets/img/products/'.$data->ProductCode);
                $filename  = "assets/img/products/$data->ProductCode/" .$file->getClientOriginalName();
                $file->move($path, $filename);
                $addImg = new product_images();
                $addImg->ProductID = $data->ProductID;
                $addImg->ProductImage = $filename;
                $addImg->save();
            }
            return back()->with('success', "Successfully!");
        }
    }
    function deleteImg($id)
    {
        $image = product_images::find($id);
        $image->delete();
        return back()->with('success', "Successfully!");
    }
    //quan ly size
    function productSize(Request $request, $id)
    {
        if($request->isMethod('GET')){
            $data = products::find($id);
            $size = sizes::all();
            $productSize = product_sizes::all()->where('ProductID', '=', $id);
            return view('admin/product/productsize', compact('data', 'size', 'productSize'));
        }
        if($request->isMethod('POST')){
            $request->validate([
                'size' => 'required'
            ]);
            $proId = products::find($id);
            $productOptionID = $proId->ProductID;
            $arr = $request->input('size');
            foreach ($arr as $val) {
                $sc = new product_sizes();
                $sc->ProductID = $productOptionID;
                $sc->SizeID = $val;
                $sc->save();
            }
            return back()->with('success', "Successfully!");
        }
    }
    function deleteSize($id)
    {
        $sc = product_sizes::find($id);
        $sc->delete();
        return back()->with('success', "Successfully!");
    }

    //Manage Order
    function manageOrder(){
        $keyword = request('keyword');
        $data = orders::orderBy('OrderID','DESC')->paginate(10);
        if($keyword){
            $data = orders::orderBy('OrderID','DESC')
                ->where('OrderStatus','LIKE','%'.$keyword.'%')
                ->paginate(10);
        }
        return view('admin/order/manage-order',compact('data'));
    }
    function manageOrderDetail($id){
        $dataOrder = orders::find($id);
        $dataDetail = orderdetails::all()->where('DetailOrderID', '=', $id);
        return view('admin/order/manage-orderDetail',compact('dataDetail','dataOrder'));
    }
}