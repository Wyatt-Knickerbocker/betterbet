<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CookieController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Database\ProductController;
use App\Http\Controllers\Database\ProductOfferedController;

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

Route::get('/', function () {
    if(!Auth::check())
        return view('welcome');
    else return redirect()->route('dashboard');
});

Route::get('/dashboard', function () {
    if(Auth::user()->isvendor)
        return view('vendor.dashboard');
    return view('user.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::post('/cart-product',[CookieController::class, 'addCart'])->name('product-to-cart');
Route::post('/cart-remove',[CookieController::class, 'pullCart'])->name('remove-from-cart');

Route::get('/cart', function () {
    if(Auth::user()->isvendor == false){
        $ians = array();
        if (Cookie::has('cart')) {
            $ians = json_decode(Cookie::get('cart'));
        }
        return view('user.cart')
        ->with('specname', DB::table('specification')->pluck('name'))
        ->with('cart', DB::table('product')->whereIn('ian',$ians)->get())
        ->with('specval', DB::table('productspec')->whereIn('product_ian',DB::table('product')->pluck('ian'))->get());
    }
    return redirect('/dashboard');
})->middleware(['auth', 'verified'])->name('cart');

Route::get('/offers', function () {
    if(Auth::user()->isvendor){
        return view('vendor.offers');
    }
    return redirect('/dashboard');
})->middleware(['auth', 'verified'])->name('offers');

Route::get('/products', function () {
    if(Auth::user()->isvendor){
        $prod = DB::table('product')->whereIn('ian', DB::table('productoffered')->where('seller_id', Auth::user()->id)->pluck('product_ian'))->get();
        return view('vendor.products')
        ->with('prod', $prod)
        ->with('specval', DB::table('productspec')->whereIn('product_ian',DB::table('product')->pluck('ian'))->get())
        ->with('specname', DB::table('specification')->pluck('name'));
    }
    return view('user.products')
    ->with('prod', DB::table('product')->get())
    ->with('specval', DB::table('productspec')->whereIn('product_ian',DB::table('product')->pluck('ian'))->get())
    ->with('specname', DB::table('specification')->pluck('name')); 
})->middleware(['auth', 'verified'])->name('products');

Route::get('/add-product', function (Request $request) {
    if(Auth::user()->isvendor){
        $prod = DB::table('product')->whereNotIn('ian', DB::table('productoffered')->where('seller_id', Auth::user()->id)->pluck('product_ian'))->get();
        return view('vendor.add-product')
        ->with('prod', $prod)
        ->with('specval', DB::table('productspec')->whereIn('product_ian',DB::table('product')->pluck('ian'))->get())
        ->with('specname', DB::table('specification')->pluck('name'));  
    }
    return view('user.dashboard');
})->middleware(['auth', 'verified'])->name('add-product');

Route::post('/ins-product',[ProductController::class, 'declare'])->name('product-specify');
Route::post('/fin-product',[ProductController::class, 'add'])->name('product-finish');

Route::get('/declare-product/{product}', function($product){
    if(Auth::user()->isvendor) {
        return view('vendor.declare-product')
        ->with('prod', DB::table('product')->where('ian', $product)->first())
        ->with('specnum', DB::table('catspeclist')->get())
        ->with('specname', DB::table('specification')->pluck('name'));
    }
})->middleware(['auth', 'verified'])->name('declare-product');

Route::get('/new-product/{ian}', function($ian){
    if(Auth::user()->isvendor) {
        return view('vendor.new-product')->with('prod', $ian);
    }
})->middleware(['auth', 'verified'])->name('new-product');

Route::get('/insert-product', function () {
    if(Auth::user()->isvendor)
        return view('vendor.insert-product');
    return view('user.dashboard');
})->middleware(['auth', 'verified'])->name('insert-product');

Route::post('/offer-product',[ProductOfferedController::class, 'add'])->name('product-confirm');

Route::post('/remove-product',[ProductOfferedController::class, 'remove'])->name('product-remove');

Route::get('/services', function () {
    if(Auth::user()->isvendor)
        return view('vendor.services');
    return view('user.services');
})->middleware(['auth', 'verified'])->name('services');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
