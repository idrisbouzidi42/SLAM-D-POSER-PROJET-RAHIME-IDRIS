<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompetencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('competences', function (Blueprint $table) {
            $table->id();
            $table->string('nom',100);
            $table->timestamps();
        });

        Schema::create('competence_offre', function (Blueprint $table) {
            $table->unsignedBigInteger('offre_id');
            $table->unsignedBigInteger('competence_id');
            $table->timestamps();
            $table->unique(['offre_id','competence_id']);
            $table->foreign('offre_id')->references('id')->on('offres')->onDelete('cascade');
            $table->foreign('competence_id')->references('id')->on('competences')->onDelete('cascade');
        });

        Schema::create('competence_demande', function (Blueprint $table) {
            $table->unsignedBigInteger('demande_id');
            $table->unsignedBigInteger('competence_id');
            $table->timestamps();
            $table->unique(['demande_id','competence_id']);
            $table->foreign('demande_id')->references('id')->on('demandes')->onDelete('cascade');
            $table->foreign('competence_id')->references('id')->on('competences')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('competence_demande');
        Schema::dropIfExists('competence_offre');
        Schema::dropIfExists('competences');
    }
}
