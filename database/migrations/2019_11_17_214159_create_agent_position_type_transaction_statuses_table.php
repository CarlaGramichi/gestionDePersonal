<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgentPositionTypeTransactionStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agent_position_type_transaction_statuses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('agent_position_type_transaction_id');
            $table->unsignedBigInteger('transaction_status_id')->default(1);
            $table->timestamps();

            $table->foreign('agent_position_type_transaction_id','aptts_id')->references('id')->on('agent_position_type_transactions');
            $table->foreign('transaction_status_id','tss_id')->references('id')->on('transaction_statuses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('agent_position_type_transaction_statuses');
    }
}
