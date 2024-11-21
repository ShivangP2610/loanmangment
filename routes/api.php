<?php

use App\Http\Controllers\Api\HomeController;
use App\Http\Controllers\Api\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Example API route for admin login

Route::post('adminlogin', [ApiController::class, 'login']);
