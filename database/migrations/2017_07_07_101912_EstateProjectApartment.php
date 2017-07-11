<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EstateProjectApartment extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estate_project_apartment', function (Blueprint $table)
        {
            $table->increments('id');
            $table->string('ProjeID')->index();
            $table->string('ProjeAdi')->nullable();
            $table->string('Il')->nullable();
            $table->string('Ilce')->nullable();
            $table->string('Ada')->nullable();
            $table->string('Parsel')->nullable();
            $table->string('BlokNo')->nullable();
            $table->string('KapiNo')->nullable();
            $table->string('KullanilisSekli')->nullable();
            $table->string('BulunduguKat')->nullable();
            $table->string('OdaSayisi')->nullable();
            $table->string('Yon')->nullable();
            $table->string('NetM2')->nullable();
            $table->string('AcikNetM2')->nullable();
            $table->string('BrutM2')->nullable();
            $table->string('Eklenti1Nitelik')->nullable();
            $table->string('Eklenti1NetM2')->nullable();
            $table->string('Eklenti1BrutM2')->nullable();
            $table->string('Eklenti2Nitelik')->nullable();
            $table->string('Eklenti2NetM2')->nullable();
            $table->string('Eklenti2BrutM2')->nullable();
            $table->string('Eklenti3Nitelik')->nullable();
            $table->string('Eklenti3NetM2')->nullable();
            $table->string('Eklenti3BrutM2')->nullable();
            $table->string('Eklenti4Nitelik')->nulelable();
            $table->string('Eklenti4NetM2')->nullable();
            $table->string('Eklenti4BrutM2')->nullable();
            $table->string('Eklenti5Nitelik')->nullable();
            $table->string('Eklenti5NetM2')->nullable();
            $table->string('Eklenti5BrutM2')->nullable();
            $table->string('GayrimenkulDurumu')->nullable();
            $table->string('SatisDegeri')->nullable();
            $table->string('SozlesmeNo')->nullable();
            $table->string('MusteriAdi')->nullable();
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
        Schema::dropIfExists('estate_project_apartment');
    }
}
