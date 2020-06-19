<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEtudiantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('etudiants', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nomEtudiant');
            $table->text('presentationEtudiant');
            $table->string('cvEtudiant')->nullable();
            $table->string('regionEtudiant');
            $table->string('villeEtudiant');
            $table->string('telEtudiant');
            $table->string('siteEtudiant');
            $table->string('emailEtudiant');
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
        Schema::dropIfExists('etudiants');
    }
}
