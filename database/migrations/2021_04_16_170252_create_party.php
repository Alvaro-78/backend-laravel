<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParty extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parties', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('partyName')->unique();
            $table->unsignedBigInteger('idgame');
            $table->foreign('idgame', 'fk_parties_games')
            ->on('games')
            ->references('id')
            ->onDelete('restrict');
            $table->unsignedBigInteger('idplayer');
            $table->foreign('idplayer', 'fk_parties_players')
            ->on('players')
            ->references('id')
            ->onDelete('restrict');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('parties');
    }
}
