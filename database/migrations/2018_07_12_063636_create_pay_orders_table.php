<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePayOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pay_orders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name_pay')->nullable();
            $table->string('phone_pay')->nullable();
            $table->string('no_pay')->nullable();
            $table->string('money_pay')->nullable();
            $table->string('bank')->nullable();
            $table->string('day_pay')->nullable();
            $table->string('time_pay')->nullable();
            $table->text('message_pay')->nullable();
            $table->string('files_pay')->nullable();
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
        Schema::dropIfExists('pay_orders');
    }
}
