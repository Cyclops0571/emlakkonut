<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParcelPhoto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parcel_photo', function (Blueprint $table) {
            $table->increments('id');
            $table->string('parcel_id');
            $table->string('name');
            $table->string('thumbnail');
            $table->string('size');
            $table->string('original_name');
            $table->unsignedInteger('width');
            $table->unsignedInteger('height');
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
        //
    }
}
