<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PartyController extends Controller
{
    //Crear party

    public function createParty(Request $request){

        $partyName = $request->input('partyName');
        $idplayer = $request->input('idplayer');
        $idgame = $request->input('idgame');

        try{

            return Party::create([
                'partyName' => $partyName,
                'idplayer' => $idplayer,
                'idgame' => $idgame,
            ]);
        }catch(QueryException $error) {
            return $error;
        }
    }
    
}
