<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\HomeController;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
  $users = User::count();
  return view('login', compact('users'));
})->name('login');
Route::post('/signup', [AuthController::class, 'signup'])->name('signup.post');
Route::post('/login', [AuthController::class, 'postLogin'])->name('login.post');

Route::middleware('auth')->group(function () {
  Route::get('/home', [HomeController::class, 'index'])->name('home');
  Route::post('/create/{type}', [HomeController::class, 'create'])->name('create');
  Route::put('/update/{id}', [HomeController::class, 'update'])->name('update');
  Route::delete('/delete/{id}', [HomeController::class, 'delete'])->name('delete');
  Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
  Route::get('/Emails', [EmailController::class, 'emails'])->name('send.emails');
});

Route::get('/send-email', [EmailController::class, 'sendEmail'])->name('send.email');
