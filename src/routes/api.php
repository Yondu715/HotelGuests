<?php

use App\Http\Controllers\Api\V1\GuestController;
use Illuminate\Support\Facades\Route;

Route::patterns([
    'guestId' => '[0-9]+'
]);

Route::prefix('guests')->group(function () {
    Route::get('/', [GuestController::class, 'index']);
    Route::post('/', [GuestController::class, 'store']);
    Route::get('/{guestId}', [GuestController::class, 'show']);
    Route::patch('/{guestId}', [GuestController::class, 'update']);
    Route::delete('/{guestId}', [GuestController::class, 'destroy']);
});

