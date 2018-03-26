<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWhaleBinancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('whale_binances', function (Blueprint $table) {
            $table->increments('id');
            $table->string('coin_id');
            $table->decimal('base_rate', 16, 8)->unsigned();
            $table->integer('bid_order');
            $table->decimal('bid', 16, 8)->unsigned()->nullable();
            $table->decimal('bid_filled')->unsigned()->default(0);
            $table->decimal('bid_back')->unsigned()->default(0);
            $table->string('bid_id')->nullable();
            $table->integer('ask_order');
            $table->decimal('ask', 16, 8)->unsigned()->nullable();
            $table->decimal('ask_filled')->unsigned()->default(0);
            $table->decimal('ask_back')->unsigned()->default(0);
            $table->string('ask_id')->nullable();
            $table->decimal('percentage')->unsigned();
            $table->decimal('volume')->unsigned();
            $table->decimal('profit')->default(0);
            $table->string('status')->default('Open');
            $table->integer('auto_replace');
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
        Schema::dropIfExists('whale_binanaces');
    }
}
