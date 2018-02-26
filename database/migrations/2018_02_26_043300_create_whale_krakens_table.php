<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWhaleKrakensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('whale_krakens', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('exchange');
            $table->double('base_rate', 7, 6)->unsigned()->nullable();
            $table->double('bid', 7, 6)->unsigned()->nullable();
            $table->double('bid_filled')->unsigned()->default(0);
            $table->string('bid_id')->nullable();
            $table->double('ask', 7, 6)->unsigned()->nullable();
            $table->double('ask_filled')->unsigned()->default(0);
            $table->string('ask_id')->nullable();
            $table->double('percentage')->unsigned()->nullable();
            $table->double('volume')->unsigned();
            $table->double('profit')->default(0);
            $table->string('status')->default('Open');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('whale_krakens');
    }
}
