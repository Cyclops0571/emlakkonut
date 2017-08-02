<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFloorTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('floor', function (Blueprint $table)
        {
            $table->increments('id');
            $table->unsignedInteger('project_id');
            $table->unsignedInteger('parcel _id');
            $table->unsignedInteger('block_id');
            $table->string('floor_numbering');
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
        Schema::dropIfExists('floor');
    }
}
