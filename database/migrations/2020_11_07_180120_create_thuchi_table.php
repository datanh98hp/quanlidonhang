<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateThuchiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('thuchi', function (Blueprint $table) {
            $table->id();
            $table->string('NDCV');
            $table->integer('SoTen_Thu');
            $table->integer('SoTen_Chi');
            $table->foreignId('id_user');$table->foreign('id_user')->references('id')->on('users');
            $table->timestamps();
        });
    }

    // //  lấy thông ds thu chi trong ngày
    // $users = DB::table('users')
    //             ->whereDate('created_at', '2016-12-31')
    //             ->get();
    
    // 
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('thuchi');
    }
}
