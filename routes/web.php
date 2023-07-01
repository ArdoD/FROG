<?php

use App\Http\Controllers\ApprovalController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\DestinationAdminController;
use App\Http\Controllers\DestinationController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\MyEventController;
use App\Http\Controllers\MyEventDetailController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SigninController;
use App\Http\Controllers\SignupController;
use App\Models\CartDetail;
use App\Models\CartHeader;
use App\Models\Category;
use App\Models\Destination;
use App\Models\Event;
use App\Models\PaymentDetail;
use App\Models\PaymentHeader;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

// Route::get('/indexResult', [IndexController::class, 'result']);
Route::get('/', [IndexController::class, 'index'])->name('index');
Route::get('/index', [IndexController::class, 'index'])->name('index');
// Route::post('products', [IndexController::class, 'store']);

Route::get('/products', [ProductController::class, 'index'])->name('products');
Route::post('/products', [ProductController::class, 'index'])->name('products');
Route::get('/products/result', [ProductController::class, 'result']);
Route::get('/productDetail/{product:id}', [ProductController::class, 'show'])->name('productDetail');
Route::post('/cartAdd', [ProductController::class, 'add']);
Route::post('/buyNow', [ProductController::class, 'buy']);

Route::post('/addProduct', [ProductController::class, 'store'])->name('addProduct');
Route::get('/addProduct', [ProductController::class, 'create'])->name('addProduct');

Route::get('/events', [EventController::class, 'index'])->name('events');
Route::get('/events/result', [EventController::class, 'result']);
Route::get('/eventDetail/{event:id}', [EventController::class, 'show'])->name('eventDetail');
Route::get('/eventDetail/{event:id}/result', [EventController::class, 'showProductDetail']);
Route::get('/createEvent', [EventController::class, 'createForm'])->name('createEvent');

Route::get('/myevents', [MyEventController::class, 'index'])->name('myEvents');
Route::get('/myEventDetail/{event:id}/{isEdit}', [MyEventController::class, 'show'])->name('myEventDetail');
Route::get('/myEventDetail/{event:id}/{isEdit}/result', [MyEventController::class, 'showProductDetail']);
Route::post('/myEventDetail/{event:id}/edit', [MyEventController::class, 'edit']);
Route::post('/createEvent', [EventController::class, 'create']);

Route::get('/destination', [DestinationController::class, 'index'])->name('destination');
Route::get('/destinationResult', [DestinationController::class, 'result']);
Route::get('/destinationDetail/{destination:id}', [DestinationController::class, 'show'])->name('destinationDetail');

Route::get('/cart', [CartController::class, 'index'])->name('cart');
Route::post('/cartMinus', [CartController::class, 'minus']);
Route::post('/cartPlus', [CartController::class, 'plus']);
Route::post('/cartDelete', [CartController::class, 'destroy']);

Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');

Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
Route::post('/profile/{user:id}/edit', [ProfileController::class, 'edit']);

Route::get('/allHistory', function () {
    return view('allHistory');
})->name('allHistory');

Route::get('/signin', [SigninController::class, 'index'])->name('signin');
Route::post('/signin', [SigninController::class, 'authenticate'])->name('signin');
Route::post('/signout', [SigninController::class, 'signout']);

Route::get('/signup', [SignupController::class, 'index'])->name('signup');
Route::post('/signup', [SignupController::class, 'store'])->name('signup');

Route::get('/approval', [ApprovalController::class, 'show'])->name('approval');
Route::post('/approvalDetail/{event:id}/edit', [ApprovalController::class, 'edit']);
Route::get('/approvalDetail/{event:id}', [ApprovalController::class, 'detail']);

// Route::get('/approvalDetail', function () {
//     return view('approvalDetail');
// })->name('approvalDetail');

// Route::get('/destinationDetail', function () {
//     return view('destinationDetail');
// })->name('destinationDetail');


Route::get('/destinationAdmin', [DestinationAdminController::class, 'index'])->name('destinationAdmin');
Route::get('/destinationDetailAdmin/{destination:id}', [DestinationAdminController::class, 'show'])->name('destinationDetailAdmin');
Route::get('/createDestinationAdmin', [DestinationAdminController::class, 'create'])->name('createDestinationAdmin');

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
