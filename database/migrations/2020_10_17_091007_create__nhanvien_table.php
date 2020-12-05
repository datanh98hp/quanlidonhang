<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNhanvienTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('_nhanvien', function (Blueprint $table) {
            $table->id('id');
            $table->string('Hoten');
            $table->string('sdt');
            $table->string('start_work');// ngày vao lam
            $table->string('end_work');// ngày vao lam
            $table->float('Hesoluong',4,2);
            $table->string('Position');
            $table->integer('luong_h');
            $table->integer('Tienluong');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('_nhanvien');
    }
}
