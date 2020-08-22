<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('career_id')->nullable();

            $table->string("name", 120);
            $table->string("identification", 120)->nullable()->unique();
            $table->string("email", 120)->nullable();
            $table->string("phone", 120)->nullable();
            $table->string("address", 120)->nullable();
            $table->string("city", 120)->nullable();
            $table->string("state", 120)->nullable();
            $table->date("born_date")->nullable();

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
        Schema::dropIfExists('students');
    }
}
