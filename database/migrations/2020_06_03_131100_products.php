<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Products extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function ($table) {
            $table->bigIncrements('id'); //Tự tăng, khóa chính
            $table->string('name'); //Kiểu chuỗi
            $table->string('detail'); //Kiểu chuỗi
            $table->double('price');
            $table->float('promotion_price');
            $table->string('promotion');
            $table->tinyInteger('image');
            $table->unsignedBigInteger('id_type'); //Kiểu int
            $table->foreign('id_type')->references('id')->on('categories'); 
            $table->tinyInteger('status');
            $table->tinyInteger('new');
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
