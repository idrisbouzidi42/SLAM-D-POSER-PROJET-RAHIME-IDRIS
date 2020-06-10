<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntreprisesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entreprises', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nomEntreprise');
            $table->string('typeEntreprise');
            $table->string('telEntreprise');
            $table->string('adresseWebEntreprise');
            $table->string('nomTuteurEntreprise');
            $table->string('rueEntreprise');
            $table->unsignedInteger('codePostalEntreprise');
            $table->string('villeEntreprise');
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
        Schema::dropIfExists('entreprises');
    }
}
