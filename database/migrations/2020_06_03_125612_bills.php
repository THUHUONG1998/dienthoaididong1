<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Bills extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bills', function ($table) {
            $table->bigIncrements('id'); //Tự tăng, khóa chính
            $table->date('date_order'); //Kiểu chuỗi
            $table->float('promt_price'); 
            $table->string('payment_method');
            $table->string('note');
            $table->string('token');
            $table->double('total');
            $table->datetime('token_date');
            $table->tinyInteger('status');
            $table->unsignedBigInteger('id_customer'); //Kiểu int
            $table->foreign('id_customer')->references('id')->on('customers'); 
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
