<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class PartyController extends Controller
{
    
    //Crear party
    
    public function createParty(Request $request){

        $partyName = $request->input('partyName');
        $idplayer = $request->input('idplayer');
        $idgame = $request->input('idgame');
        $idmessage = $request->input('idmessage');

        try{

            return Party::create([
                'partyName' => $partyName,
                'idplayer' => $idplayer,
                'idgame' => $idgame,
                'idmessage' => $idmessage
            ]);
        }catch(QueryException $error) {
            return $error;
        }
    }

}
