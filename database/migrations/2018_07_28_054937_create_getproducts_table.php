<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGetproductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('getproducts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('product')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->integer('status')->default('0');
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
        Schema::dropIfExists('getproducts');
    }
}
