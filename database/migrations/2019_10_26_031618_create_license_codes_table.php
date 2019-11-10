<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLicenseCodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'license_codes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('granting_officer_id');
            $table->unsignedBigInteger('intervening_officer_id');
            $table->unsignedBigInteger('license_type_id');
            $table->enum('kind_days', ['corridos','habiles']);
            $table->string('code', 120);
            $table->string('description', 250);
            $table->unsignedSmallInteger('old_article')->nullable();
            $table->unsignedSmallInteger('new_article')->nullable();
            $table->unsignedTinyInteger('number_days');
            $table->enum('is_deleted', [0, 1, 2, 3])->default('0');
            $table->timestamps();

            $table->foreign('granting_officer_id')->references('id')->on('license_officers');
            $table->foreign('intervening_officer_id')->references('id')->on('license_officers');
            $table->foreign('license_type_id')->references('id')->on('license_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('license_codes');
    }
}
