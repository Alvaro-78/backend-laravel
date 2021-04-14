<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controller\PlayerController;



// Rutas controladoras de player

Route::get('/player/{nickName}', [PlayerController::class, 'playerName']);
Route::post('/player', [PlayerController::class, 'registerPlayer']);
Route::put('/player', [PlayerController::class, 'modifyPlayer']);


