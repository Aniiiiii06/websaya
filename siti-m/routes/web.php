<?php

use App\Http\Controllers\PostController;
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

Route::get('/', function () {
    return view('home' , [
        'title' => 'Landing Home Page',
        'name' => 'Belajar Laravel Application News',
    ]);
});

Route::get('/about', function () {
    return view('about' , [
        'title' => 'welcome to about',
        'name' => 'Belajar Laravel Application News',
    ]);
});

Route::get('/contact', function () {
    return view('contact' , [
        'title' => 'welcome to contact',
        'name' => 'Belajar Laravel Application News',
    ]);
});

route::resource('/post',PostController::class);
