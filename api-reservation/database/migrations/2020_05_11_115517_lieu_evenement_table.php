<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class LieuEvenementTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('localisations', function (Blueprint $table) {
            $table->integer('lieu_id')->unsigned();
            $table->integer('evenement_id')->unsigned();
            $table->foreign('lieu_id')->references('id')->on('lieus');
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
        Schema::table('localisations', function(Blueprint $table) {
            $table->dropForeign('abonnements_user1_id_foreign');
        });

        Schema::table('localisations', function(Blueprint $table) {
            $table->dropForeign('abonnements_user2_id_foreign');
        });

        Schema::dropIfExists('localisations');
    }
}
