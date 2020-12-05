<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhieuxuatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phieuxuat', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_user');$table->foreign('id_user')->references('id')->on('users');
            $table->dateTime('Tgian_xuat');
            $table->foreignId('id_Donhang');$table->foreign('id_Donhang')->references('id')->on('donhang');
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
        Schema::dropIfExists('phieuxuat');
    }
}
