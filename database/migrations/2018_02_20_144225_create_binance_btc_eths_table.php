<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBinanceBtcEthsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('binance_btc_eths', function (Blueprint $table) {
            $table->increments('id');

            $table->timestamps();

            for ($i = 1 ; $i < 31 ; $i++) {
                $table->double('bid_'.$i, 7, 6)->nullable()->unsigned();
                $table->double('v_bid_'.$i, 6, 2)->nullable()->unsigned();
                $table->double('vt_bid_'.$i, 6, 2)->nullable()->unsigned();
                $table->double('ask_'.$i, 7, 6)->nullable()->unsigned();
                $table->double('v_ask_'.$i, 6, 2)->nullable()->unsigned();
                $table->double('vt_ask_'.$i, 6, 2)->nullable()->unsigned();
            }
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('binance_btc_eths');
    }
}
