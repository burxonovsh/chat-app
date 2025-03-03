<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChatController;

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/messages', [ChatController::class, 'fetchMessages']);
    Route::post('/messages', [ChatController::class, 'sendMessage']);
});
