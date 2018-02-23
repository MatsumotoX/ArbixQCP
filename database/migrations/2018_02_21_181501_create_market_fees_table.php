<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMarketFeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('market_fees', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->string('exchange')->unique();
            $table->float('fee_taker', 4, 3)->unsigned();
            $table->float('fee_maker', 4, 3)->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('market_fees');
    }
}
