<?php

// use App\Http\Controllers\HubController;

use App\Livewire\Home;
use App\Livewire\Hubs;
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

//Home
Route::get('/', Home::class)->name('home');

//Checkout
Route::get('/checkout', Hubs::class)->name('checkout');
Route::get('/view-hub', [Hubs::class, 'view-hub'])->name('view-hub');
