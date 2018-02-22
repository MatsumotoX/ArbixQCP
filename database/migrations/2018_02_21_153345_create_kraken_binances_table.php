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
           
            $table->float('01market', 7, 6);
            $table->float('01buymarket', 7, 6);
            $table->float('01sellmarket', 7, 6);
            $table->float('01buybuy', 7, 6);
            $table->float('01sellsell', 7, 6);

            $table->float('01market_taker', 7, 6);
            $table->float('01buymarket_taker', 7, 6);
            $table->float('01sellmarket_taker', 7, 6);
            $table->float('01buybuy_taker', 7, 6);
            $table->float('01sellsell_taker', 7, 6);
            
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
