<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePositionTypeHoursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('position_type_hours', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('position_type_id');
            $table->string('file', 120);
            $table->unsignedSmallInteger('hours');
            $table->enum('is_deleted', [0, 1, 2, 3])->default('0');

            $table->timestamps();

            $table->foreign('position_type_id')->references('id')->on('position_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('position_type_hours');
    }
}
