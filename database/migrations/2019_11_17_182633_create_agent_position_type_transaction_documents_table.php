<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgentPositionTypeTransactionDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agent_position_type_transaction_documents', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('agent_position_type_transaction_id');
            $table->unsignedBigInteger('document_id');
            $table->string('file',120);
            $table->timestamps();

            $table->foreign('agent_position_type_transaction_id','apttd_id')->references('id')->on('agent_position_type_transactions');
            $table->foreign('document_id')->references('id')->on('documents');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('agent_position_type_transaction_documents');
    }
}
