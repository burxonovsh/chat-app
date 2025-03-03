<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChatController;

Route::middleware(['auth'])->group(function () {
    Route::get('/chat', [ChatController::class, 'index'])->name('chat');
});
