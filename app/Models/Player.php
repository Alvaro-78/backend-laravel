<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    use HasFactory;

    protected $fillable = ['nickName', 'password', 'email'];

    public function playerParty() {
        return $this -> belongsTo('App\Models\Party', 'idplayer');
    }
}
