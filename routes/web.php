<?php

use App\Http\Controllers\Usercontroller;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('users', [Usercontroller::class, 'index'])->name('user');
Route::post('users', [Usercontroller::class, 'store'])->name('users.store');
Route::get('users/create', [Usercontroller::class, 'create'])->name('users.create');
Route::delete('users/destroy/{id}', [Usercontroller::class, 'destroy'])->name('users.destroy');
Route::get('users/edit/{id}', [Usercontroller::class], 'edit')->name('users.edit');
Route::put('users/update', [Usercontroller::class], 'update')->name('users.update');