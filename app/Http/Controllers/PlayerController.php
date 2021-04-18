<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Player;
use App\Models\Party;
use Illuminate\Database\QueryException;

use Illuminate\Support\Facades\Hash;


class PlayerController extends Controller
{

    //Login

    public function loginPlayer(Request $request){

        $nickName = $request->input('nickName');
        $password = $request->input('password');

        try{
            //Miramos que el nickName existe en la tabla player

            $validatePlayer = Player::select('password')
            ->where('nickName', 'LIKE', $nickName)
            ->first();

            if(!$validatePlayer){
                return response()->json([
                    //nickName incorrecto
                    'error'=> "Nickname o password incorrecto"
                ]);
            }

            $hashed = $validatePlayer->password;

            //Comprobar si password recibido corresponde con el del nickName del player

            if(Hash::check($password, $hashed)){

                //Genera token

                $length = 35;
                $token = bin2hex(random_bytes($length));

                //Guardamos el token en su campo de la DB

                Player::where('nickName', $nickName)
                ->update(['token' => $token]);

                //Devolvemos al front la info ya actualizada
                return Player::where('nickName', 'LIKE', $nickName)
                ->get();

            }else{
                return response()->json([
                    //password incorrecto
                    'error' => "Nickname o password incorrecto"
                ]);
            }
        }catch(QueryException $error){
            
            return response()->$error;
        }
    }

    //LogOut

    public function logOutPlayer(Request $request){

        $nickName = $request->input('nickName');

        try{

            return Player::where('nickName', '=', $nickName)
            ->update(['token' => '']);

        }catch(QueryException $error){
            return $error;
        }
    }
    
    
    
    // Buscamos el nombre del jugador

    public function playerName($nickName) {

        try {

            return Player::all() -> where(['nickName', '=', $nickName]) -> makeHidden(['password']) -> keyBy('id');

        } catch(QueryException $error) {
            return $error;
        }
    }

     //Función encargada de registrar un nuevo usuario

    public function registerPlayer(Request $request) {

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

    // Modificamos los atributos del Player

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
