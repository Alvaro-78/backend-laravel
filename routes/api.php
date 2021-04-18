<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PlayerController;
use App\Http\Controllers\GameController;



// Rutas controladoras de player

Route::get('/player/{nickName}', [PlayerController::class, 'playerName']);
Route::post('/player', [PlayerController::class, 'registerPlayer']);
Route::post('/player/login', [PlayerController::class, 'loginPlayer']);
Route::post('/player/logout', [PlayerController::class, 'logOutPlayer']);
Route::put('/player', [PlayerController::class, 'modifyPlayer']);


Route::post('/party', [PlayerController::class, 'createParty']);


Route::post('/game', [GameController::class, 'createGame']);
Route::get('/game', [GameController::class, 'allGames']);






