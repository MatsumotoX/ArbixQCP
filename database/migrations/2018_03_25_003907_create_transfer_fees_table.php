<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransferFeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transfer_fees', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->string('exchange')->unique();
            $table->integer('coin_id');
            $table->decimal('fee_deposit',16,8)->nullable()->default(0);
            $table->decimal('fee_withdraw',16,8)->nullable()->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transfer_fees');
    }
}
