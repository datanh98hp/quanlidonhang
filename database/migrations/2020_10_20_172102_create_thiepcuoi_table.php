<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateThiepcuoiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('thiepcuoi', function (Blueprint $table) {
            $table->id();

            $table->foreignId('id_user'); $table->foreign('id_user')->references('id')->on('users');

            $table->string('KH');
            $table->string('o_nhatrai');
            $table->string('b_nhatrai');
            $table->string('o_nhatgai');
            $table->string('b_nhagai');
            $table->string('of');
            $table->string('chure');
            $table->string('codau');
            $table->string('bac_chure');
            $table->string('bac_codau');
            $table->string('time_an_trai');
            $table->string('time_tochuc_trai');
            $table->string('time_an_gai');
            $table->string('time_tochuc_gai');
            $table->string('diachi_nhatrai');
            $table->string('diachi_nhagai');
            $table->string('sdt_trai');
            $table->string('sdt_gai');
            $table->bigInteger('soluong_trai');
            $table->bigInteger('soluong_gai');

            $table->bigInteger('Tong_tien');
            $table->bigInteger('Dat_coc');
            $table->string('code_thiep');
            $table->string('ngay_tra');

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
        Schema::dropIfExists('thiepcuoi');
    }
}
