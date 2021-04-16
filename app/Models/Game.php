<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    protected $fillable = 'gameName';

    public function gameParty() {
        return $this -> hasMany('App\Models\Party', 'idgame');
    }

}
