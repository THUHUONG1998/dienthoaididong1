<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BillDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bill_detail', function ($table) {
            $table->bigIncrements('id'); //Tự tăng, khóa chính
            $table->integer('quantity');
            $table->double('price');
            $table->double('discount_price');
            $table->unsignedBigInteger('id_bill'); //Kiểu int
            $table->foreign('id_bill')->references('id')->on('bills'); 
            $table->unsignedBigInteger('id_product'); //Kiểu int
            $table->foreign('id_product')->references('id')->on('products'); 
           // $table->timestamps(); //Tự cập nhật thời gian
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
