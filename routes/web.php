<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TagController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\SubTagController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ProjectsController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\SubproductController;

//AUTH
Route::get('/', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('masuk');

Route::middleware('auth:sanctum')->group(function () {
    //USER
    Route::get('/user', [UserController::class, 'index'])->name('user');
    Route::get('/adduser', [UserController::class, 'create'])->name('adduser');
    Route::post('/createuser', [UserController::class, 'store'])->name('createuser');
    Route::get('/edituser/{id}', [UserController::class, 'edit'])->name('edituser');
    Route::put('/updateuser/{id}', [UserController::class, 'update'])->name('updateuser');
    Route::delete('/destroyuser/{id}', [UserController::class, 'destroy'])->name('destroyuser');
    //PAGES
    Route::get('/dashboard', [PagesController::class, 'dashboard'])->name('dashboard');
    Route::get('/content', [PagesController::class, 'content'])->name('content');
    Route::get('/works', [PagesController::class, 'works'])->name('works');
    Route::get('/setting', [PagesController::class, 'setting'])->name('setting');
    Route::get('/profil', [PagesController::class, 'profil'])->name('profil');
    Route::get('/search', [PagesController::class, 'search'])->name('search');
    //KATEGORI
    Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori');
    Route::get('/addkategori', [KategoriController::class, 'create'])->name('addkategori');
    Route::post('/createkategori', [KategoriController::class, 'store'])->name('createkategori');
    Route::get('/editkategori/{id}', [KategoriController::class, 'edit'])->name('editkategori');
    Route::put('/updatekategori/{id}', [KategoriController::class, 'update'])->name('updatekategori');
    Route::delete('/destroykategori/{id}', action: [KategoriController::class, 'destroy'])->name('destroykategori');
    //TAG
    Route::get('/tag', [TagController::class, 'index'])->name('tag');
    Route::get('/addtag', [TagController::class, 'create'])->name('addtag');
    Route::post('/createtag', [TagController::class, 'store'])->name('createtag');
    Route::get('/edittag/{id}', [TagController::class, 'edit'])->name('edittag');
    Route::put('/updatetag/{id}', [TagController::class, 'update'])->name('updatetag');
    Route::delete(uri: '/destroytag/{id}', action: [TagController::class, 'destroy'])->name('destroytag');
    //PRODUCT
    Route::get('/product', [ProductController::class, 'index'])->name('product');
    Route::get('/addproduct', [ProductController::class, 'create'])->name('addproduct');
    Route::post('/createproduct', [ProductController::class, 'store'])->name('createproduct');
    Route::get('/editproduct/{id}', [ProductController::class, 'edit'])->name('editproduct');
    Route::put('/updateproduct/{id}', [ProductController::class, 'update'])->name('updateproduct');
    Route::delete(uri: '/destroyproduct/{id}', action: [ProductController::class, 'destroy'])->name('destroyproduct');
    //SUBPRODUCT
    Route::get('/subproduct', [SubproductController::class, 'index'])->name(name: 'subproduct');
    Route::get('/addsubproduct', [SubproductController::class, 'create'])->name('addsubproduct');
    Route::post('/createsubproduct', [SubproductController::class, 'store'])->name('createsubproduct');
    Route::get('/editsubproduct/{id}', [SubproductController::class, 'edit'])->name('editsubproduct');
    Route::put('/updatesubproduct/{id}', [SubproductController::class, 'update'])->name('updatesubproduct');
    Route::delete(uri: '/destroysubproduct/{id}', action: [SubproductController::class, 'destroy'])->name('destroysubproduct');
    //SUBTAG
    Route::get('/subtag', [SubTagController::class, 'index'])->name(name: 'subtag');
    Route::get('/addsubtag', [SubTagController::class, 'create'])->name('addsubtag');
    Route::post('/createsubtag', [SubTagController::class, 'store'])->name('createsubtag');
    Route::get('/editsubtag/{id}', [SubTagController::class, 'edit'])->name('editsubtag');
    Route::put('/updatesubtag/{id}', [SubTagController::class, 'update'])->name('updatesubtag');
    Route::delete(uri: '/destroysubtag/{id}', action: [SubTagController::class, 'destroy'])->name('destroysubtag');
    //LOGOUT
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
});

// Route::middleware('auth:sanctum')->group(function () {
//     //USER
//     Route::get('/user', [UserController::class, 'index'])->name('user');
//     Route::get('/adduser', [UserController::class, 'create'])->name('adduser');
//     Route::post('/createuser', [UserController::class, 'store'])->name('createuser');
//     Route::get('/edituser/{id}', [UserController::class, 'edit'])->name('edituser');
//     Route::put('/updateuser/{id}', [UserController::class, 'update'])->name('updateuser');
//     Route::delete('/destroyuser/{id}', [UserController::class, 'destroy'])->name('destroyuser');
//     //PAGES
//     Route::get('/dashboard', [PagesController::class, 'dashboard'])->name('dashboard');
//     Route::get('/content', [PagesController::class, 'content'])->name('content');
//     Route::get('/setting', [PagesController::class, 'setting'])->name('setting');
//     Route::get('/profil', [PagesController::class, 'profil'])->name('profil');
//     Route::get('/search', [PagesController::class, 'search'])->name('search');
//     //LOGOUT
//     Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
// });
