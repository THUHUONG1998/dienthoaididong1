<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Slide extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('slide', function ($table) {
            $table->bigIncrements('id'); //Tự tăng, khóa chính
            $table->string('image'); //Kiểu chuỗi
            $table->string('link'); //Kiểu chuỗi
            $table->string('title');
            $table->tinyInteger('status');
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
