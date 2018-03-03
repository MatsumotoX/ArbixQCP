<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSignalCriteriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('signal_criterias', function (Blueprint $table) {
            $table->increments('id');
            $table->string('status');
            $table->string('bot');
            $table->string('exchange');
            $table->string('pairing');
            $table->string('conditionsign');

            $table->integer('strategy');
            $table->integer('exchange1');
            $table->integer('exchange2');
            $table->integer('coin1');
            $table->integer('coin2');
            $table->double('criteria_percentage');
            $table->integer('condition');
            $table->integer('interval');
            $table->integer('logic');
            $table->dateTime('temptime1');
            $table->dateTime('temptime2');
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
        Schema::dropIfExists('signal_criterias');
    }
}
