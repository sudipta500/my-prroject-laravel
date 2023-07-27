<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\BlogController;

Route::get('/blog',[BlogController::class,'blog']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
