<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Player;
use Illuminate\Database\QueryException;

use Illuminate\Support\Facades\Hash;


class PlayerController extends Controller
{
    //Función encargada de registrar un nuevo usuario

    public function registerPlayer(Request $request){
        $nickName = $request -> input('nickName');
        $password = $request -> input('password');
        $email = $request -> input('email');

        //Hasheamos el password
        $password = Hash::make($password);

        try {

            return Player::create([
                'nickName' => $nickName,
                'password' => $password,
                'email' => $email
            ]);

        } catch (QueryException $error) {

        
            $eCode = $error -> errorInfo[1];

            if($eCode == 1062) {
                return response()-> json([
                    'error' => "Usuario registrado anteriormente"
                ]);
            }
        }
    }

    public function modifyPlayer(Request $request) {

        $nickName = $request -> input('nickName');
        $password = $request -> input('password');
        $email = $request -> input('email');

        try {

            return Player::where('nickName', '=', $nickName) -> update(['password' => $password]);
            
        } catch (QueryException $error) {
            return $error;
        }
    }
}
