<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKrakenBtcEthsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kraken_btc_eths', function (Blueprint $table) {
            $table->increments('id');
            
            $table->timestamps();

            for ($i = 1 ; $i < 31 ; $i++) {
                $table->float('bid_'.$i, 7, 6)->unsigned();
                $table->float('v_bid_'.$i, 6, 2)->unsigned();
                $table->float('vt_bid_'.$i, 6, 2)->unsigned();
                $table->float('ask_'.$i, 7, 6)->unsigned();
                $table->float('v_ask_'.$i, 6, 2)->unsigned();
                $table->float('vt_ask_'.$i, 6, 2)->unsigned();
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
        Schema::dropIfExists('kraken_btc_eths');
    }
}
