<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\DataBase\QueryException;
use App\Models\Message;

class MessageController extends Controller
{
    // Enviamos message

    public function sendMessage(Request $request) {

        $idplayer = $request -> input('idplayer');
        $idparty = $request -> input('idparty');
        $text = $request -> input('text');

        try {

            return Message::create([
                'idplayer' => $idplayer,
                'idparty' => $idparty,
                'idtext' => $text
            ]);
        } catch (QueryException $error) {

            return $error;
        }
    }

    // Borramos message

    public function deleteMessage($idplayer, $id) {

        $text = Message::where('id', '=', $id) 
        -> where('idplayer', '=', $idplayer)
        -> first();
        
        if($text) {
            try {

                return $text -> delete();

            }catch (QueryException $error) {

                return $error;
            }
        } else {
            return response() -> json([
                'success' => false,
                'message' => 'El mensaje no se puede borrar'
            ], 1000);
        }

    }

    // Traer todos los text

    public function indexAllMessage($id) {

        try {

            return Message::all() -> where('idparty', '=', $id);

        } catch(QueryException $error) {

            return $error;
        }
    }
}


