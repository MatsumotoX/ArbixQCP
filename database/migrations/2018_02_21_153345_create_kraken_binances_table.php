<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKrakenBinancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kraken_binances', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
           
            $table->float('Kr_market_buy', 7, 6);
            $table->float('Kr_market_sell', 7, 6);
            $table->float('Kr_buy', 7, 6);
            $table->float('Kr_sell', 7, 6);
            $table->float('Kr_buybuy', 7, 6);
            $table->float('Kr_sellsell', 7, 6);

            $table->float('Bi_market_buy', 7, 6);
            $table->float('Bi_market_sell', 7, 6);
            $table->float('Bi_buy', 7, 6);
            $table->float('Bi_sell', 7, 6);
            $table->float('Bi_buybuy', 7, 6);
            $table->float('Bi_sellsell', 7, 6);
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kraken_binances');
    }
}
