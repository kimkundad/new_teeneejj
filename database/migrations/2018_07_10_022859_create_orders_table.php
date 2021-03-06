<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('name_order');
            $table->string('lastname_order');
            $table->string('email_order');
            $table->string('telephone_order');
            $table->string('country_order');
            $table->string('postal_code_order');
            $table->text('street_order');
            $table->integer('order_status')->default('0');
            $table->integer('total')->default('0');
            $table->integer('shipping_price')->default('0');
            $table->text('note')->nullable();
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
        Schema::dropIfExists('orders');
    }
}
