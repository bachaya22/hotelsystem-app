<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CheckoutController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('user.page.home');
});


 Route::get('/home' ,[AdminController::class, 'index'])->name('home');
 Route::get('/createroom' ,[AdminController::class, 'createroom']);
 Route::get('/viewroom' ,[AdminController::class, 'viewroom']);

 Route::post('/rooms.store' ,[AdminController::class, 'roomstore']);
 Route::get('/roomdelete/{id}' ,[AdminController::class, 'roomdelete']);
 Route::get('/roomedit/{id}' ,[AdminController::class, 'roomedit']);
 Route::post('/roomupdate/{id}' ,[AdminController::class, 'roomupdate']);
 Route::get('/books' ,[AdminController::class, 'books'])->middleware(['auth' , 'admin']);
 Route::get('/deletebook/{id}' ,[AdminController::class, 'deletebook']);
 Route::get('/approvebook/{id}' ,[AdminController::class, 'approvebook']);
 Route::get('/rejectbook/{id}' ,[AdminController::class, 'rejectbook']);
 Route::get('/viewgallery' ,[AdminController::class, 'viewgallery']);

 Route::post('/uploadimage' ,[AdminController::class, 'uploadimage']);
route::get('/deleteimage/{id}' ,[AdminController::class, 'deleteimage']);

route::get('/message',[AdminController::class,'message']);
route::get('/sendmessage/{id}' ,[AdminController::class, 'sendmessage']);

route::post('/mail/{id}' ,[AdminController::class, 'mail']);

Route::get('aboutdatas', [AdminController::class, 'indexaboutdata']);
Route::get('add-aboutdata', [AdminController::class, 'createaboutdata']);
Route::post('add-aboutdata', [AdminController::class, 'storeaboutdata']);
Route::get('edit-aboutdata/{id}', [AdminController::class, 'editaboutdata']);
Route::put('update-aboutdata/{id}', [AdminController::class, 'updateaboutdata']);
Route::delete('delete-aboutdata/{id}', [AdminController::class, 'destroyaboutdata']);
route::get('/order',[AdminController::class ,'order']);

route::get('/delivery/{id}',[AdminController::class ,'delivery']);

route::get('viewcatagory',[AdminController::class,'viewcatagory']);
route::post('addcatagory',[AdminController::class,'addcatagory']);

route::get('delete_catagory/{id}',[AdminController::class,'delete_catagory']);
route::get('view_product',[AdminController::class ,'view_product']);

route::post('/add_product',[AdminController::class ,'add_product']);
route::get('/show_product',[AdminController::class ,'show_product']);
route::get('/delete_product/{id}',[AdminController::class ,'delete_product']);
route::get('/edit_product/{id}',[AdminController::class ,'edit_product']);
route::post('/edit_product_confirm/{id}',[AdminController::class ,'edit_product_confirm']);




route::get('/product_details/{id}',[HomeController::class ,'product_details']);

 Route::get('/' ,[HomeController::class, 'index'])->name('home');


Route::get('/blog' ,[HomeController::class, 'blog']);
Route::get('/usergallery' ,[HomeController::class, 'usergallery']);
Route::get('/ourroom' ,[HomeController::class, 'ourroom']);
Route::get('/about' ,[HomeController::class, 'about']);
Route::get('/contact' ,[HomeController::class, 'contact']);
Route::get('/roomdetail/{id}' ,[HomeController::class, 'roomdetail']);
Route::post('/bookroom/{id}' ,[HomeController::class, 'bookroom']);
route::post('/contactform',[HomeController::class,'contactform']);


route::get('aboutdatadetail/{id}',[HomeController::class,'aboutdatadetail']);

route::post('/add_card/{id}',[HomeController::class ,'add_card']);
route::get('/show_card',[HomeController::class ,'show_card']);
route::get('/remove_card/{id}',[HomeController::class ,'remove_card']);
route::get('/cash_order',[HomeController::class ,'cash_order']);
route::get('/stripe/{totalprice}',[HomeController::class ,'stripe']);
route::post('/stripepost/{totalprice}',[HomeController::class ,'stripepost'])->name('stripepost');


Route::get('/checkout/{product_id}',[CheckoutController::class, 'index'] );

Route::get('/checkout',[CheckoutController::class,'DoCheckout']);

Route::post('/paymentStatus',[CheckoutController::class,'PaymentStatus']);
