<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ParticipantEvenementTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evenement_user', function (Blueprint $table) {
            $table->integer('user_id')->unsigned();
            $table->integer('evenement_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('evenement_id')->references('id')->on('evenements');
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
        Schema::table('evenement_user', function(Blueprint $table) {
            $table->dropForeign('evenement_user_user_id_foreign');
        });

        Schema::table('evenement_user', function(Blueprint $table) {
            $table->dropForeign('evenement_user_evenement_id_foreign');
        });

        Schema::dropIfExists('evenement_user');
    }
}
