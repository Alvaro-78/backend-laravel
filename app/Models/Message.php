<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        'text',
        'idparty',
        'idplayer'
    ];

    public function messagePlayer() {
        return $this -> belongsTo('App\Models\Player', 'idplayer', 'id');
    }

    public function messageParty() {
        return $this -> belongsTo('App\Models\Party', 'idparty', 'id');
    }
}
