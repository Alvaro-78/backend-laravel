<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Membership extends Model
{
    use HasFactory;

    protected $fillable = [
        'idparty',
        'idplayer'
    ];

    public function membershipParty(){

        return $this->belongsTo('App\Models\Party', 'idparty', 'id');

    }

    public function membershipPlayer(){

        return $this->belongsTo('App\Models\Player', 'idplayer', 'id');
        
    }
}
