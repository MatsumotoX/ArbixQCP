<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoinonesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coinones', function (Blueprint $table) {
            $table->increments('id');
            $table->double('BTC_bid')->unsigned();
            $table->double('BTC_ask')->unsigned();
            $table->double('ETH_bid')->unsigned();
            $table->double('ETH_ask')->unsigned();
            $table->double('XRP_bid')->unsigned();
            $table->double('XRP_ask')->unsigned();
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
        Schema::dropIfExists('coinones');
    }
}
