<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProshopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proshops', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name_pro')->nullable();
            $table->string('code_pro')->nullable();
            $table->integer('cat_id');
            $table->integer('price');
            $table->string('image_pro')->nullable();
            $table->text('detail')->nullable();
            $table->integer('view')->default('0');
            $table->integer('status')->default('0');
            $table->integer('rating')->default('0');
            $table->integer('stock')->default('0');
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
        Schema::dropIfExists('proshops');
    }
}
