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
            $table->unsignedBigInteger('level_id');
            $table->unsignedBigInteger('shift_id');
            $table->unsignedBigInteger('institution_id');
            $table->unsignedSmallInteger('year');
            $table->enum('type', ['original', 'rectificado'])->default('original');
            $table->date('upload_date');
            $table->string('cue', 120);
            $table->string('department', 200);
            $table->unsignedSmallInteger('total_approved_teaching_positions');
            $table->unsignedSmallInteger('total_approved_non_teaching_positions');
            $table->unsignedSmallInteger('total_teaching_approved_hours');
            $table->string('file');
            $table->enum('is_deleted', [0, 1, 2, 3])->default('0');
            $table->timestamps();

            $table->foreign('level_id')->references('id')->on('levels');
            $table->foreign('shift_id')->references('id')->on('shifts');
            $table->foreign('institution_id')->references('id')->on('institutions');
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
