<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCareerCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('career_courses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('career_id');
            $table->string('name',250);
            $table->enum('is_deleted', [0, 1, 2, 3])->default('0');
            $table->timestamps();

            $table->foreign('career_id')->references('id')->on('careers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('career_courses');
    }
}
