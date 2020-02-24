<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFlighSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fligh_schedules', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('flight_no');
            $table->bigInteger('tail_id')->nullable();
            $table->longText('tail_no');
            $table->longText('origin');
            $table->longText('destination');
            $table->text('eta');
            $table->text('std');
            $table->text('etd')->nullable();
            $table->text('atd')->nullable();
            $table->text('ata')->nullable();
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
        Schema::dropIfExists('fligh_schedules');
    }
}
