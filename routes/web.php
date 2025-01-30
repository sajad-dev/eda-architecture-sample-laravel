<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::post('/send', [App\Http\Controllers\NewMessageController::class, 'send']);
