<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    use HasFactory;

    protected $fillable = ['nickName', 'password', 'email', 'token'];

    public function playerParty() {
        return $this -> hasMany('App\Models\Party', 'idplayer');
    }

    public function playerMessage() {
        return $this -> hasMany('App\Models\Message', 'idplayer');
    }
}
