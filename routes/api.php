<?php

use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TagController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ProjectsController;
use App\Http\Controllers\CategoriesController;

//KATEGORI
Route::get('/kategoris', [KategoriController::class, 'index']);
Route::get('/kategori/{id}', [KategoriController::class, 'show']);

//TAG
Route::get('/tags', [TagController::class, 'index']);
Route::get('/tag/{id}', [TagController::class, 'show']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
