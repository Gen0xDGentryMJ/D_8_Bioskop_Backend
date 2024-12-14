<?php

use App\Http\Controllers\BioskopController;
use App\Http\Controllers\HistoryUserController;
use App\Http\Controllers\KursiController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ShowController;
use App\Http\Controllers\StudioController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\UserController;
use App\Models\Show;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);

// Route::post('/user/register', [UserController::class, 'register']);
// Route::post('/user/login', [UserController::class, 'login']);

Route::middleware('auth:sanctum')->group(function(){
    //user
    // Route::get('/user/index', [UserController::class, 'index']);
    Route::put('/user/updateImage', [UserController::class, 'updateProfilePicture']);
    Route::put('/user/updateData', [UserController::class, 'update']);
    Route::delete('/user/delete/{id}', [UserController::class, 'delete']);
    Route::get('/user', [UserController::class, 'index']);
    Route::get('/user/{id}', [UserController::class, 'show']);
    //menu
    Route::resource('/menu', UserController::class);
    //tiket
    Route::resource('/ticket', TicketController::class);
    //histori user
    Route::resource('/historyUser', HistoryUserController::class);
    //bioskop
    Route::resource('/bioskop', BioskopController::class);
    //kursi
    Route::resource('/kursi', KursiController::class);
    //movie
    Route::resource('/movie', MovieController::class);
    //review
    Route::resource('/review', ReviewController::class);
    //show
    Route::resource('/show', ShowController::class);
    //studio
    Route::resource('/studio', StudioController::class);
    //transaksi
    Route::resource('/transaksi', TransaksiController::class);
});



// //user
// Route::post('/user/register', [UserController::class, 'register']);
// Route::post('/user/login', [UserController::class, 'login']);
// Route::get('/user', [UserController::class, 'index']);
// Route::get('/user/{id}', [UserController::class, 'show']);

// //menu
// Route::get('/menu', [UserController::class, 'index']);
// //tiket
// Route::resource('/ticket', TicketController::class);

// //histori user

// //bioskop
// Route::resource('/Bioskop', BioskopController::class);

// //kursi
// Route::resource('/kursi', KursiController::class);

// //movie
// Route::resource('/movie', MovieController::class);

// //review

// //show
// //Route::resource('/show', ShowController::class);
// Route::get('/show/{id}', [ShowController::class, 'show']);
// Route::post('/show', [ShowController::class, 'findIdByShow']);
// //Route::post('/show', [ShowController::class, 'store']);
// //studio
// Route::resource('/studio', StudioController::class);
// //transaksi

