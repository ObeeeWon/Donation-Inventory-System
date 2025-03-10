<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;

Route::get('/', function () {
    return view('welcome');
});

// display the Item page created
Route::get('/items/create', [ItemController::class, 'create'])->name('items.create');

// process Item page
Route::post('/items', [ItemController::class, 'store'])->name('items.store');