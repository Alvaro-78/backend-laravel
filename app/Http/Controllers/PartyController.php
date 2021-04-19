<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use App\Models\Party;


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
    
    public function deleteParty(Request $request){
        $idPartyDelete = $request->input('id');
        try {
            return Party::where ('id', '=', $idPartyDelete)
            ->delete();
        } catch(QueryException $error){
            return $error;
        }
        
    }
    
}
