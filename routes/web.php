<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('/create/{type}', [HomeController::class, 'create'])->name('create');
Route::put('/update/{id}', [HomeController::class, 'update'])->name('update');
Route::delete('/delete/{id}', [HomeController::class, 'delete'])->name('delete');
