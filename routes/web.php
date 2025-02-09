<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TagController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ProjectsController;
use App\Http\Controllers\CategoriesController;

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
Route::delete('/destroytag/{id}', action: [TagController::class, 'destroy'])->name('destroytag');
//LOGOUT
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
});

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
    Route::get('/setting', [PagesController::class, 'setting'])->name('setting');
    Route::get('/profil', [PagesController::class, 'profil'])->name('profil');
    Route::get('/search', [PagesController::class, 'search'])->name('search');
    //LOGOUT
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
    });
    


