<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subjects', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('career_course_id');
            $table->unsignedBigInteger('career_course_division');
            $table->unsignedBigInteger('regimen_id');
            $table->unsignedSmallInteger('hours');
            $table->enum('is_deleted', [0, 1, 2, 3]);
            $table->timestamps();

            $table->foreign('career_course_id')->references('id')->on('career_courses');
            $table->foreign('career_course_division')->references('id')->on('career_course_divisions');
            $table->foreign('regimen_id')->references('id')->on('regimens');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subjects');
    }
}
