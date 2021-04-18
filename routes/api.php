<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PlayerController;
use App\Http\Controllers\GameController;



// Rutas controladoras de player

Route::get('/player/{nickName}', [PlayerController::class, 'playerName']);
Route::get('/player', [PlayerController::class, 'allPlayers']);
Route::post('/player', [PlayerController::class, 'registerPlayer']);
Route::post('/player/login', [PlayerController::class, 'loginPlayer']);
Route::post('/player/logout', [PlayerController::class, 'logOutPlayer']);
Route::put('/player', [PlayerController::class, 'modifyPlayer']);

//Rutas controladoras de party
Route::post('/party', [PlayerController::class, 'createParty']);

//Rutas controladoras de game
Route::post('/game', [GameController::class, 'createGame']);
Route::get('/game', [GameController::class, 'allGames']);






