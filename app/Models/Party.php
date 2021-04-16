<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Party extends Model
{
    use HasFactory;

    protected $fillable = 'partyName';

    public function partyMessage() {
        return $this -> hasMany('App\Models\Message', 'idparty');
    }

    public function partyPlayer() {
        return $this -> hasMany('App\Models\Player', 'idparty');
    }

    public function partyGame() {
        return $this -> belongsTo('App\Models\Game', 'idgame', 'id');
    }


}
