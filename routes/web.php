<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\UserController;
use App\Models\Book;
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

// Route welcome everyone can access it
Route::get('/', function () {
    return view('welcome');
});

// Route login only guest can access it
Route::middleware(['guest'])->group(function () {
    Route::view('/login', 'login')->name('login');
    Route::view('/register', 'register')->name('register');
    Route::post('/save-register', [UserController::class, 'register']);
});

Route::post('/checklogin', [UserController::class, 'checklogin']);

// Route logout only user who login can accaess it
Route::middleware(['auth'])->group(function () {
    Route::post('/logout', [UserController::class, 'logout']);
});

// Route dashboard only user who login and role admin can access it
Route::middleware(['auth', 'role:Admin'])->group(function () {
    Route::controller(BookController::class)->group(function () {
        // Show book dashboard
        Route::get('/dashboard', 'show')->name('dashboard');

        // Show view create book
        Route::get('/createbook', 'showViewCreateBook');

        // store data 
        Route::post('/store-book', 'store');

        // Delete Data Book
        Route::post('/delete-book/{id}', 'destroy');
    });
});

// Route dashboard only user who login and role client can access it
Route::middleware(['auth', 'role:Client'])->group(function () {
    Route::view('/home', 'home')->name('home');
});
