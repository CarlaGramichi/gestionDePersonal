<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusIdToAgentPositionTypes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('agent_position_types', function (Blueprint $table) {
            $table->unsignedBigInteger('status_id')->default('1')->after('position_type_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('agent_position_types', function (Blueprint $table) {
            $table->dropColumn('status_id');
        });
    }
}
