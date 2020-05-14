<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEvenementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evenements', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->nullable();
            $table->integer('lieu_id')->unsigned()->nullable();
            $table->string('name', 255);
			$table->string('description', 255);
			$table->datetime('date');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('lieu_id')->references('id')->on('lieus')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('evenements', function(Blueprint $table) {
            $table->dropForeign('evenements_lieu_id_foreign');
        });
        Schema::table('evenements', function(Blueprint $table) {
            $table->dropForeign('evenements_user_id_foreign');
        });
        Schema::dropIfExists('evenements');
    }
}
