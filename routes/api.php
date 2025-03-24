<?php
use App\Http\Controllers\API\ItemController;
use Illuminate\Support\Facades\Route;

Route::prefix('items')->group(function () {
    Route::post('/', [ItemController::class, 'store']); // create item
    Route::get('/', [ItemController::class, 'index']); // get all items
    Route::get('/{id}', [ItemController::class, 'show']); // get one item
    Route::put('/{id}', [ItemController::class, 'update']); // upgrade item
    Route::delete('/{id}', [ItemController::class, 'destroy']); // delete item
});

