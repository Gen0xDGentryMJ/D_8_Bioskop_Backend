<?php

use App\Http\Controllers\BioskopController;
use App\Http\Controllers\KursiController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\ShowController;
use App\Http\Controllers\StudioController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//user
Route::post('/user/register', [UserController::class, 'register']);
Route::post('/user/login', [UserController::class, 'login']);
Route::get('/user', [UserController::class, 'index']);
Route::get('/user/{id}', [UserController::class, 'show']);

//menu
Route::get('/menu', [UserController::class, 'index']);
//tiket
Route::resource('/ticket', TicketController::class);

//histori user

//bioskop
Route::resource('/Bioskop', BioskopController::class);

//kursi
Route::resource('/kursi', KursiController::class);

//movie
Route::resource('/movie', MovieController::class);

//review

//show
//Route::resource('/show', ShowController::class);
Route::post('/show', [ShowController::class, 'findIdByShow']);
//studio
Route::resource('/studio', StudioController::class);
//transaksi

