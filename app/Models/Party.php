<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Party extends Model
{
    use HasFactory;

    protected $fillable = ['partyName', 'idgame', 'idplayer'];

    public function partyMessage() {
        return $this -> hasMany('App\Models\Message', 'idparty');
    }

    public function partyMembership() {
        return $this -> hasMany('App\Models\Membership', 'idparty');
    }

    public function partyGame() {
        return $this -> belongsTo('App\Models\Game', 'idgame', 'id');
    }


}
