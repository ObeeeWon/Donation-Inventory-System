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






//when you're ready to do the validation and not just testing ya dumbass, slap ts in
//Route::middleware(['auth', 'admin'])->group(function () { routes for users go here });

Route::get('/admin/users', [App\Http\Controllers\AdminController::class, 'viewUsers'])->name('admin.viewUsers');

Route::get('/admin/users/create', [App\Http\Controllers\AdminController::class, 'createUserForm'])->name('admin.createUserForm');

Route::post('/admin/users/create', [App\Http\Controllers\AdminController::class, 'createUser'])->name('admin.createUser');

Route::get('/admin/users/{UserID}/edit', [App\Http\Controllers\AdminController::class, 'editUser'])->name('admin.editUser');

Route::put('/admin/users/{UserID}/edit', [App\Http\Controllers\AdminController::class, 'updateUser'])->name('admin.updateUser');

Route::delete('/admin/users/{UserID}', [App\Http\Controllers\AdminController::class, 'deleteUser'])->name('admin.deleteUser');

Route::resource('itemdesc', App\Http\Controllers\ItemDescController::class);
Route::resource('itemlocation', App\Http\Controllers\ItemLocationController::class);
// Route::resource('itemloc', App\Http\Controllers\ItemLocationController::class);


