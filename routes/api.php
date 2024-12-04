<?php

use App\Http\Controllers\KursiController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');
Route::post('/user/register', [UserController::class, 'register']);
Route::post('/user/login', [UserController::class, 'login']);
Route::get('/menu/index', [UserController::class, 'index']);
Route::resource('/ticket', TicketController::class);

Route::resource('/kursi', KursiController::class);