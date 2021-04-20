<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PlayerController;
use App\Http\Controllers\PartyController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\MessageController;



// Rutas controladoras de player

Route::get('/player/{nickName}', [PlayerController::class, 'searchPlayer']);
Route::get('/player', [PlayerController::class, 'allPlayers']);
Route::post('/player', [PlayerController::class, 'registerPlayer']);
Route::post('/player/login', [PlayerController::class, 'loginPlayer']);
Route::post('/player/logout', [PlayerController::class, 'logOutPlayer']);
Route::put('/player', [PlayerController::class, 'modifyPlayer']);

//Rutas controladoras de party
Route::post('/party', [PartyController::class, 'createParty']);
Route::delete('/party/id', [PartyController::class, 'deleteParty']);
Route::get('/party/{gameName}', [PartyController::class, 'searchPartyGameName']);
Route::post('/party/join', [PartyController::class, 'joinParty']);
Route::delete('/party/leave/{id}', [PartyController::class, 'leaveParty']);

//Rutas controladoras de game
Route::post('/game', [GameController::class, 'createGame']);
Route::get('/game', [GameController::class, 'allGames']);

//Rutas controladoras de message
Route::post('/message', [MessageController::class, 'sendMessage']);
Route::get('/message/{id}', [MessageController::class, 'indexAllMessage']);
Route::delete('/message/{id}/{idplayer}', [MessageController::class, 'deleteMessage']);


