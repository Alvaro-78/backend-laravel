<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use App\Models\Party;
use App\Models\Membership;


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

    // Buscamos parties según el juego

    public function searchPartyGameName($gameName) {

        return Party::selectRaw('parties.id, games.id AS idgame, games.gameName')
        ->join('games', 'games.id', '=', 'parties.id')
        ->where('games.gameName', 'LIKE', $gameName)
        ->get();
  
    }
    
    // Entrar en partyName
    
    public function joinParty(Request $request) {

        $idplayer = $request -> input('idplayer');
        $idparty = $request -> input('idparty');

        try {

            return Membership::create([
                'idplayer' => $idplayer,
                'idparty' => $idparty
            ]);
        } catch (queryException $error) {
            return $error;
        }
    }

    // Salir de una partyName

    public function leaveParty($id) {

        $member = Membership::find($id);
        
        try {

            return $member -> delete();
        } catch (queryException $error) {
            return $error;
        }
    }
}
