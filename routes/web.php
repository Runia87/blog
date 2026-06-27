<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\ImagesController;
use App\Http\Controllers\HomeController;
 


Route::get('/', [ImagesController::class, 'index']);


Route::get('/about',  [HomeController::class, 'about']);

Route::get('/create',[ImagesController::class, 'create'] );

Route::get('/show/{id}',[ImagesController::class, 'show'] );

Route::get('/edit/{id}',[ImagesController::class, 'edit']  );

Route::post('/store', [ImagesController::class, 'store']);

Route::post('/update/{id}', [ImagesController::class, 'update'] );

Route::get('/delete/{id}', [ImagesController::class, 'delete']);

