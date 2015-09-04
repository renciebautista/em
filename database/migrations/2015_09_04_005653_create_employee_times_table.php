<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeeTimesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_times', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('employee_id');
            $table->integer('terminal_id');
            $table->integer('location_id');
            $table->timestamp('timestamp');
            $table->integer('sensortype_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('employee_times');
    }
}
