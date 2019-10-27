<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCareerCourseDivisionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('career_course_divisions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('career_course_id');
            $table->string('name',250);
            $table->enum('is_deleted', [0, 1, 2, 3]);
            $table->timestamps();

            $table->foreign('career_course_id')->references('id')->on('career_courses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('career_course_divisions');
    }
}
