<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;
use Illuminate\Database\QueryException;


class GameController extends Controller
{
    public function createGame(Request $request) {

        $gameName = $request->input('gameName');
        
        try {
            return Game::create(['gameName' => $gameName]);
        } catch (QueryException $error) {
            return $error;
        }
    }
}
