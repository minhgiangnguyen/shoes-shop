<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\product_sizes;
use App\Models\orders;
use Gloudemans\Shoppingcart\Facades\Cart;

session_start();
class CartController extends Controller
{
    public function cart()
    {
        $proSize = product_sizes::all();
        return view("shoppingCart.cart", compact('proSize'));
    }
    public function saveCart(Request $request)
    {

        $request->validate([
            'size' => 'required'
        ]);
        $productId = $request->productid_hidden;
        $prosize = $request->size;
        $product_info = DB::table('products')->where('ProductID', $productId)->first();
        // dd($product_info);

        // Cart::add('293ad', 'Product 1', 1, 9.99, 550);
        // Cart::destroy();
        $data['id'] = $productId;
        $data['qty'] = $request->qty;
        $data['name'] = $product_info->ProductName;
        $data['price'] = $product_info->ProductPrice;
        $data['weight'] = "10";
        $data['options'] = ['image' => $product_info->ProductThumb,'size' => $prosize];
        Cart::add($data);
        Cart::setGlobalTax(10);
        return Redirect()->back()->with('success', "Successfully!");
    }
    public function delete_to_cart($rowId)
    {
        // dd($rowId);
        Cart::remove($rowId);
        return Redirect()->back()->with('success', "Successfully!");
    }
    public function update_cart_qty(Request $request)
    {
        $rowId = $request->rowId;
        $quantity = $request->qty;
        // dd($quantity);
        Cart::update($rowId, $quantity);
        return Redirect()->back()->with('success', "Successfully!");
    }
    public function update_cart_size(Request $request)
    {
        $rowId = $request->rowId;
        // dd($prosize);
        $product_info = DB::table('products')->where('ProductID', $request->proId)->first();
        
        Cart::update($rowId, ['options'  => ['image' => $product_info->ProductThumb,'size' => $request->size]]);
        return Redirect()->back()->with('success', "Successfully!");
    }
    public function updateStatus(Request $request)
    {
        $id = $request->id;
        $data = $request->only('OrderStatus');
        orders::find($id)->update($data);
        return Redirect()->back()->with('success', "Successfully!");
    }
}