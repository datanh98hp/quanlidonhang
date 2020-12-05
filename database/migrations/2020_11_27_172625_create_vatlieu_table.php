<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVatlieuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vatlieu', function (Blueprint $table) {
            $table->id();
            $table->string('TenVL');
            $table->integer('Soluong_ton');
            $table->string('NSX');
            $table->integer('Don_gia');
            $table->string('Donvi_tinh');

            $table->foreignId('id_phieunhap');$table->foreign('id_phieunhap')->references('id')->on('phieunhap');
            $table->foreignId('id_phieuxuat');$table->foreign('id_phieuxuat')->references('id')->on('phieuxuat');
            $table->foreignId('id_ncc');$table->foreign('id_ncc')->references('id')->on('nhacungcaps');
            
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
        Schema::dropIfExists('vatlieu');
    }
}
