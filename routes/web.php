<?php

// use App\Http\Controllers\HubController;

use App\Http\Controllers\PaymentController;
use App\Livewire\Home;
use App\Livewire\Hubs;
use App\Mail\Mailgun;
use Illuminate\Support\Facades\Mail;
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

//Payment
Route::get('paypal',[PaymentController::class, 'paypal'] )->name('paypal');
Route::get('success',[PaymentController::class, 'success'] )->name('success');
Route::get('cancel',[PaymentController::class, 'cancel'] )->name('cancel');

Route::get('/mail', function () {
    try{
        Mail::to(users:'omib.94@gmail.com')->send(new Mailgun());
    }catch(\Exception $e){
        dd($e->getMessage());
    }
    return "done!";
});
// Route::get('/thank-you', function () {
//     return view('thank-you');
// })->name('thank-you');

Route::get('/view-hub', [Hubs::class, 'view-hub'])->name('view-hub');
