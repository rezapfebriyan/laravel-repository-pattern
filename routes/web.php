<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

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

Route::controller(ContactController::class)->group(function() {
    Route::get('/', 'index');
    Route::get('/contact/{id}', 'show');
});

Route::controller(PostController::class)->group(function() {
    Route::get('/post', 'index');
    Route::get('/post/create', 'store');
});
