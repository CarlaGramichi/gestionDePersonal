<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePofsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pofs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('year_id');
            $table->unsignedBigInteger('level_id');
            $table->unsignedBigInteger('shift_id');
            $table->string('cue', 120);
            $table->string('institution', 120);
            $table->unsignedSmallInteger('total_approved_teaching_positions');
            $table->unsignedSmallInteger('total_approved_non_teaching_positions');
            $table->unsignedSmallInteger('total_teaching_approved_hours');
            $table->string('file');
            $table->enum('is_deleted', [0, 1, 2, 3]);
            $table->timestamps();

            $table->foreign('year_id')->references('id')->on('years');
            $table->foreign('level_id')->references('id')->on('levels');
            $table->foreign('shift_id')->references('id')->on('shifts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pofs');
    }
}
