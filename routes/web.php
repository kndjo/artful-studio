<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\AptController;

// Route::get('/', function () {
//     return view('front.index');
// });

// Route::get('/form', function () {
//     return view('try.form');
// });

// Route::get('/review', function () {
//     return view('');
// });

Route::get('/das', function () {
   return view('appointments.index');
});



Route::resource('clients', ClientController::class);
Route::resource('appointments', AppointmentController::class);

Route::resource('apts', AptController::class);