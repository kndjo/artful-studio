<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\AptController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;


// Route::get('/', function () {
//     return view('front.index');
// });

// Route::get('/form', function () {
//     return view('try.form');
// });

// Route::get('/review', function () {
//     return view('');
// });

// Route::get('/das', function () {
//    return view('appointments.index');
// });

Route::redirect('/','/login');

Route::resource('clients', ClientController::class)->middleware('auth');;
Route::resource('appointments', AppointmentController::class)->middleware('auth');;

//Route::resource('apts', AptController::class);


Route::get('login', [AuthController::class, 'getLoginPage'])->name('auth.login')->middleware('guest');
Route::post('login', [AuthController::class, 'authenticate'])->name('authenticate')->middleware('guest');






Route::get('/homepage', [DashboardController::class, 'index'])->name('homepage')->middleware('auth');;
Route::post('/logout',[AuthController::class, 'logout'])->name('auth.logout')->middleware('auth');;







Route::get('/register', [AuthController::class, 'getRegisterPage'])->name('register')->middleware('auth');;
Route::post('/register', [AuthController::class, 'register'])->middleware('auth')->middleware('guest');





Route::get('/forgot-password', [AuthController::class, 'getForgotPasswordPage'])->name('forgot-password')->middleware('guest');

Route::post('/forgot-password', [AuthController::class, 'requestForgotPasswordLink'])->name('auth.requestForgotPasswordLink')->middleware('guest');



Route::get('/reset-password/{token}', [AuthController::class, 'getResetPage'])->name('auth.reset')->middleware('guest');

Route::post('/reset-password',[AuthController::class, 'getrequestReset'])->name('auth.requestReset')->middleware('guest');