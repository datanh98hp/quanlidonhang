<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMathangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mathang', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_Donhang');$table->foreign('id_Donhang')->references('id')->on('donhang');
            $table->foreignId('id_Banggia');$table->foreign('id_Banggia')->references('id')->on('banggia');
            $table->string('Soluong');
            $table->string('Desc');
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
        Schema::dropIfExists('mathang');
    }
}
