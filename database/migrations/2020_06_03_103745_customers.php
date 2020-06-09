<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Customers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function ($table) {
            $table->bigIncrements('id'); //Tự tăng, khóa chính
            $table->string('name'); //Kiểu chuỗi
            $table->string('gender'); //Kiểu chuỗi
            $table->string('email');
            $table->string('address');
            $table->string('phone');
            //$table->timestamps(); //Tự cập nhật thời gian
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
