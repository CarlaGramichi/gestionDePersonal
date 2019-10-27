<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgentContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agent_contacts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('agent_id');
            $table->unsignedBigInteger('relationship_id');
            $table->string('name', 250);
            $table->string('surname', 250);
            $table->unsignedBigInteger('dni');
            $table->date('born_date');
            $table->string('email', 120);
            $table->string('phone', 120);
            $table->string('cellphone', 120);
            $table->string('address', 250);
            $table->string('city', 250);
            $table->string('state', 250);
            $table->string('country', 120);
            $table->enum('is_deleted', [0, 1, 2, 3]);
            $table->timestamps();

            $table->foreign('agent_id')->references('id')->on('agents');
            $table->foreign('relationship_id')->references('id')->on('relationships');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('agent_contacts');
    }
}
