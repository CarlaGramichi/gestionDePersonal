<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttendancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attendances', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('agent_subject_schedule_id');
            $table->unsignedBigInteger('attendance_state_id');
            $table->timestamps();

            $table->foreign('agent_subject_schedule_id')->references('id')->on('agent_subject_schedules');
            $table->foreign('attendance_state_id')->references('id')->on('attendance_states');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('attendances');
    }
}
