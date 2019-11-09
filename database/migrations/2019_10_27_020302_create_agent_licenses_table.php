<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgentLicensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agent_licenses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('agent_id');
            $table->unsignedBigInteger('license_code_id');
            $table->date('request_date');
            $table->date('start_date');
            $table->unsignedSmallInteger('certificate_number');
            $table->date('certificate_receipt_date');
            $table->string('certificate_file', 120);
            $table->timestamps();

            $table->foreign('agent_id')->references('id')->on('agents');
            $table->foreign('license_code_id')->references('id')->on('license_codes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('agent_licenses');
    }
}
