<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\DetailsController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\LogInController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\FallbackController;
use App\Http\Controllers\ProfileController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class, 'index'])-> name("home.index");
Route::controller(ShopController::class)->group(function () {
    Route::get('/category/all', 'getAllProduct')-> name("shop.all");
    Route::get('/category/{gender}','filterGender') ->whereIn('gender', ['women', 'men', 'kids'])-> name("shop.gender");
    // Route::get('/category/{gender}','filterGender')-> name("shop.gender");
    Route::get('/category/{collection}','filterCollection') -> name("shop.collection");
    // Route::get('/product', 'getAllProduct');
});
Route::get('/category', function () {
    return redirect()->route('shop.all');
});
Route::get('/product', function () {
    return redirect()->route('shop.all');
});
Route::get('/product/{slug}', [DetailsController::class,'getRowProduct'])-> name("product.details");


Route::controller(LoginController::class)->group(function () {
    // Route::get('/login','showLogin')-> name("home.login");
    // Route::post('/login','storeLogin');
    // Route::get('/register','showRegister')-> name("home.register");
    // Route::post('/register','storeRegister');
    // Route::get('/logout','logout')-> name("home.logout");
    // Route::get('/profile','showProfile')-> name("home.profile");
    // Route::post('/profile', 'postProfile');
    // Route::get('/register',[LogInController::class, 'showFormRegister'])->name('show-form-register');
    Route::get('/register','showFormRegister')->name('show-form-register');
    Route::post('/register','register')->name('register');
    Route::get('/actived/{user}/{UserToken}','actived')->name('show-actived');
    Route::get('/login','showFormLogin')->name('show-form-login');
    Route::post('/login','login')->name('login');
    Route::get('/logout','logout')->name('logout');
    
});
Route::controller(ProfileController::class)->group(function () {
    Route::get('/profile', 'showProfile')->name('show-profile');
    Route::get('/updatefile', 'showUpDateFile')->name('show-updatefile');
    Route::post('/updatefile', 'upDateFile')->name('updatefile');
    Route::get('/changepassword', 'showChangePassword')->name('show-changepassword');
    Route::post('/changepassword', 'changePassword')->name('changepassword');
    
});

//cart
Route::controller(CartController::class)->group(function () {
    Route::get('/shoppingCart/cart','cart') -> name("cart");
    Route::post('/save-cart','saveCart')->name('save-cart');
    Route::get('/delete-to-cart/{rowId}','delete_to_cart');
    Route::put('/update-cart-qty','update_cart_qty')->name('updateCartQty');
    Route::put('/update-cart-size','update_cart_size')->name('updateCartSize');
    Route::put('/update-order-status','updateStatus')->name('updateStatus');
});
//checkout
Route::controller(CheckoutController::class)->group(function () {
    Route::get('/checkout','checkout')-> name("checkout");
    Route::get('/confirmation','confirmation')-> name("confirm");
    Route::post('/save-checkout','save_checkout')->name('save_checkout');
    Route::get('/shoppingCart/payment-checkout','payment_checkout')->name('payment_checkout');
    Route::post('/order-place','order_place')->name('order_place');
    //vnpay_payment
    Route::post('/shoppingCart/vnpay_payment','vnpay_payment')->name('vnpay_payment');
    Route::get('/shoppingCart/paymentIndex','paymentIndex') -> name("paymentIndex");
});
//404 Page
Route::fallback(FallbackController::class);

Route::get('/logon',[AdminController::class, 'logon'])->name('logon');
Route::post('/logon',[AdminController::class, 'postLogon'])->name('admin.logon');
Route::get('/sign-out',[AdminController::class, 'signOut'])->name('admin.signout');
Route::prefix('admin')->middleware('quantri')->group(function () {
    Route::get('/home',[AdminController::class, 'index'] )->name("admin.home");
    Route::get('/addProduct',[ProductController::class, 'index'])->name('products');
    Route::post('/addProduct',[ProductController::class, 'addProduct'])->name('addProduct');
    Route::get('/listPro',[ProductController::class, 'listPro'])->name('listPro');
    //category
    Route::get('/homeCat',[CategoryController::class, 'homeCat'])->name('homeCat');
    Route::post('/addCat',[CategoryController::class, 'addCat'])->name('addCat');
    Route::get('/deleteCat/{id?}', [CategoryController::class, 'deleteCat'])->name('deleteCat');
    //gender
    Route::post('/addGender',[CategoryController::class, 'addGender'])->name('addGender');
    Route::get('/delGender/{id?}', [CategoryController::class, 'delGender'])->name('delGender');
    //size
    Route::post('/addSize',[CategoryController::class, 'addSize'])->name('addSize');
    Route::get('/delSize/{id?}', [CategoryController::class, 'delSize'])->name('delSize');
    //color
    Route::post('/addColor',[CategoryController::class, 'addColor'])->name('addColor');
    Route::get('/delColor/{id?}', [CategoryController::class, 'delColor'])->name('delColor');
    //Recycle Bin
    Route::get('/recycleBin', [ProductController::class, 'recycleBin'])->name('recycleBin');
    Route::get('/restore/{id?}', [ProductController::class, 'restore'])->name('restore');
    Route::post('/deleteAll',[ProductController::class, 'deleteAll'])->name('deleteAll');
    //edit
    Route::get('/edit/{id?}',[ProductController::class, 'edit'])->name('edit');
    Route::put('/editPro/{id?}', [ProductController::class, 'editPro'])->name('editPro');
    Route::get('/deletePro/{id?}', [ProductController::class, 'delete'])->name('delete');
    //imagelist
    Route::match(['get', 'post'], '/imgList/{id?}',[ProductController::class, 'img_list'])->name('img_list');
    Route::get('/deleteImg/{id?}', [ProductController::class, 'deleteImg'])->name('deleteImg');
    //quan ly product size
    Route::match(['get', 'post'], '/productSize/{id?}',[ProductController::class, 'productSize'])->name('productSize');
    Route::get('/deleteSize/{id?}', [ProductController::class, 'deleteSize'])->name('deleteSize');
    //Management User/Admin
    Route::controller(AdminController::class)->group(function () {
        Route::get('/guest-manage', 'guestManagement')->name('guestManagement');
        Route::get('/guest-information/{id?}', 'guestInformation')->name('guestInformation');

        Route::match(['get', 'post'], '/add-new-admin', 'addNewAdmin')->name('addNewAdmin');
        Route::get('/admin-manage', 'adminManagement')->name('adminManagement');
        Route::match(['get', 'post'], '/admin-information/{id?}', 'adminInformation')->name('adminInformation');
        Route::post('/admin-delete', 'adminDelete')->name('adminDelete');
    });
    //Manage Order
    Route::controller(ProductController::class)->group(function () {
        Route::get('/order-manage','manageOrder')->name('manageOrder');
        Route::get('/orderDeltail-manage/{id?}','manageOrderDetail')->name('manageOrderDetail');
    });
});