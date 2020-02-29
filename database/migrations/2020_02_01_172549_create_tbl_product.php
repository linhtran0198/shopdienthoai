<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_product', function (Blueprint $table) {
            $table->Increments('product_id');
            $table->integer('category_id');
            $table->string('product_title');
            $table->string('product_name');
            $table->string('product_img');
            $table->string('product_price');
            $table->string('product_os');
            $table->string('product_cpu');
            $table->string('product_camera');
            $table->string('product_screen');
            $table->string('product_ram');
            $table->string('product_pin');
            $table->text('product_desc');
             $table->integer('product_status');
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
        Schema::dropIfExists('tbl_product');
    }
}
