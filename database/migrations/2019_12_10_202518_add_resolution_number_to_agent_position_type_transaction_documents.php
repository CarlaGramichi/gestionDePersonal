<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddResolutionNumberToAgentPositionTypeTransactionDocuments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('agent_position_type_transaction_documents', function (Blueprint $table) {
            $table->unsignedBigInteger('resolution_number')->after('document_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('agent_position_type_transaction_documents', function (Blueprint $table) {
            $table->dropColumn('resolution_number');
        });
    }
}
