<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLicenceCodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'licence_codes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('granting_officer_id');
            $table->unsignedBigInteger('intervening_officer_id');
            $table->unsignedBigInteger('licence_type_id');
            $table->unsignedBigInteger('kind_days_id');
            $table->string('code', 120);
            $table->string('description', 250);
            $table->unsignedSmallInteger('old_article');
            $table->unsignedSmallInteger('new_aticle');
            $table->unsignedTinyInteger('number_days');
            $table->enum('is_deleted', [0, 1, 2, 3])->default('0');
            $table->timestamps();

            $table->foreign('granting_officer_id')->references('id')->on('licence_officers');
            $table->foreign('intervening_officer_id')->references('id')->on('licence_officers');
            $table->foreign('licence_type_id')->references('id')->on('licence_types');
            $table->foreign('kind_days_id')->references('id')->on('kind_days');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('licence_codes');
    }
}
