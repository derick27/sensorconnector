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
        Schema::create('logs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('version', 50);
            $table->string('eui', 50);
            $table->string('packet', 50);
            $table->string('packet_time', 50);
            $table->string('serial_number', 50);
            $table->integer('level')->unsigned();
            $table->integer('battery')->unsigned();
            $table->integer('temperature')->unsigned();
            $table->string('payload', 100);
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
