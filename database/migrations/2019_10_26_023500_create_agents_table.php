<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agents', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name',250);
            $table->string('surname',250);
            $table->unsignedBigInteger('dni');
            $table->unsignedBigInteger('cuil');
            $table->date('born_date');
            $table->string('email',120);
            $table->string('phone',120);
            $table->string('cellphone',120);
            $table->string('address',250);
            $table->string('city',250);
            $table->string('state',250);
            $table->string('country',120);
            $table->enum('is_deleted', [0, 1, 2, 3]);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('agents');
    }
}
