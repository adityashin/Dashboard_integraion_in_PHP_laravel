<?php

use App\Http\Controllers\FetchController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\TestimonialsController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/index',function(){
    return view('frontend/index');
});

Route::resource('/team',TeamController::class);


Route::resource('/service',ServiceController::class);

Route::resource('/testimonials',TestimonialsController::class);

Route::get('/frontservice',[FetchController::class,'service']);

Route::get('/frontabout',[FetchController::class,'team']);

Route::get('/frontteam',[FetchController::class,'team']);

