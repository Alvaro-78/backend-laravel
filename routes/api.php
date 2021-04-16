<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controller\PlayerController;



// Rutas controladoras de player

Route::get('/player/{nickName}', [PlayerController::class, 'playerName']);
Route::post('/player', [PlayerController::class, 'registerPlayer']);
Route::post('/player/login', [PlayerController::class, 'loginPlayer']);
Route::post('/player/logout', [PlayerController::class, 'logOutPlayer'])->middleware('token');
Route::put('/player', [PlayerController::class, 'modifyPlayer']);
Route::post('/player/party', [PlayerController::class, 'createParty']);





