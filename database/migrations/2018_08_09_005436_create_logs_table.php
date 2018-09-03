<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create ('logs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('version', 50);
            $table->string('loraDevEui', 50);
            $table->string('loraPacketSequenceNumber', 50);
            $table->string('packetTimestamp', 50);
            $table->string('deviceSerialNumber', 50);
            $table->integer('tankLevel')->unsigned();
            $table->integer('batteryVoltage')->unsigned();
            $table->integer('temperature')->unsigned();
            $table->string('rawPayloadBytes', 100);
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
        Schema::dropIfExists('logs');
    }
}
