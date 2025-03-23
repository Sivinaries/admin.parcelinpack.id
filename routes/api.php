<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TagController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SubTagController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\SubproductController;

//PROJECT
Route::get('/projects', [ProjectController::class, 'index']);
Route::get('/project/{id}', [ProjectController::class, 'show']);

//KATEGORI
Route::get('/kategoris', [KategoriController::class, 'index']);
Route::get('/kategori/{id}', [KategoriController::class, 'show']);

//TAG
Route::get('/tags', [TagController::class, 'index']);
Route::get('/tag/{id}', [TagController::class, 'show']);

//TAG
Route::get('/posts', [PostController::class, 'index']);
Route::get('/post/{id}', [PostController::class, 'show']);

//PRODUCT
Route::get('/products', [ProductController::class, 'index']);
Route::get('/product/{id}', [ProductController::class, 'show']);

//SUBPRODUCT
Route::get('/subproducts', [SubproductController::class, 'index']);
Route::get('/subproduct/{id}', [SubproductController::class, 'show']);

//SUBTAG
Route::get('/subtags', [SubTagController::class, 'index']);
Route::get('/subtag/{id}', [SubTagController::class, 'show']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
