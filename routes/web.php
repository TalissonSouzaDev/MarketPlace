<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\{
    StoreController,
    ProductController
    ,CategorieController,
    CategorieProductController};

use App\Http\Controllers\{HomeController,CheckoutController,CartController,CategoryController};

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

Route::get('/',[HomeController::class,'index'])->name('home');
Route::get('/produto/{slug}',[HomeController::class,'produtoSlug'])->name('produto.slug');
Route::get('/category/{slug}',[CategoryController::class,'index'])->name('category');
Route::get('/store/{slug}',[StoreController::class,'storeproduct'])->name('store.product');

Route::prefix('cart')->name('cart.')->group(function(){
    Route::get('/carrinho',[CartController::class,'index'])->name('index');
    Route::post('/add',[CartController::class,'add'])->name('add');
    Route::get('/remove/{slug}',[CartController::class,'remove'])->name('remove');
    Route::get('/cancel',[CartController::class,'cancel'])->name('cancel');
});

Route::prefix('MarketPlace')->middleware('web')->group(function(){

// Store Loja 
Route::get('/store',[StoreController::class,'index'])->name('store.index');
Route::get('/store/create',[StoreController::class,'create'])->name('store.create');
Route::post('/store/store',[StoreController::class,'store'])->name('store.store');
Route::get('/store/edit/{uuid}',[StoreController::class,'edit'])->name('store.edit');
Route::put('/store/put/{uuid}',[StoreController::class,'update'])->name('store.update');
Route::delete('/store/destroy/{uuid}',[StoreController::class,'destroy'])->name('store.destroy');


// product Loja 
Route::get('/product',[ProductController::class,'index'])->name('product.index');
Route::get('/product/create',[ProductController::class,'create'])->name('product.create');
Route::get('/product/show/{id}',[ProductController::class,'show'])->name('product.show');
Route::post('/product/product',[ProductController::class,'store'])->name('product.store');
Route::get('/product/edit/{id}',[ProductController::class,'edit'])->name('product.edit');
Route::put('/product/put/{id}',[ProductController::class,'update'])->name('product.update');
Route::delete('/product/destroy/{id}',[ProductController::class,'destroy'])->name('product.destroy');
Route::delete('/product/destroy/{id}/image',[ProductController::class,'destroyimage'])->name('product.image.destroy');

// categoria Loja 
Route::get('/categorie',[CategorieController::class,'index'])->name('categorie.index');
Route::get('/categorie/create',[CategorieController::class,'create'])->name('categorie.create');
Route::post('/categorie/categorie',[CategorieController::class,'store'])->name('categorie.store');
Route::get('/categorie/edit/{id}',[CategorieController::class,'edit'])->name('categorie.edit');
Route::put('/categorie/put/{id}',[CategorieController::class,'update'])->name('categorie.update');
Route::delete('/categorie/destroy/{id}',[CategorieController::class,'destroy'])->name('categorie.destroy');


// Categorie x product 
Route::get('/product/categorie/{id}',[CategorieProductController::class,'categorie'])->name('categerie.product');
Route::match(['GET','POST'],'/product/categorie/available',[CategorieProductController::class,'ViewNotCategorie'])->name('categerie.product.available');
Route::post('/product/categorie/attach/{id}',[CategorieProductController::class,'attach'])->name('categerie.product.attach');
Route::post('/product/categorie/dettach/{id}',[CategorieProductController::class,'dettach'])->name('categerie.product.dettach');



});

// checkout

Route::prefix('checkout')->name('checkout.')->group(function(){
    Route::get('/',[CheckoutController::class,'index'])->name('index');
    Route::post('/process',[CheckoutController::class,'process'])->name('process');

});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
