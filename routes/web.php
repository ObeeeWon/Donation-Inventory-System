<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ItemDescController;
use App\Http\Controllers\ItemLocationController;

Route::get('/', function () {
    return view('welcome');
});

// display the Item page created
Route::get('/items/create', [ItemController::class, 'create'])->name('items.create');

// process Item page
Route::post('/items', [ItemController::class, 'store'])->name('items.store');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/homepage', [App\Http\Controllers\ItemController::class, 'index'])->name('homepage');

Route::get('/items/{item}/edit', [ItemController::class, 'edit'])->name('item.edit');

Route::get('/items/delete/{ItemID}', [App\Http\Controllers\ItemController::class, 'confirmDelete'])->name('items.confirmDelete');

Route::put('/items/{item}', [ItemController::class, 'update'])->name('item.update');

Route::resource('itemdesc', App\Http\Controllers\ItemDescController::class);

Route::resource('itemloc', App\Http\Controllers\ItemLocationController::class);


