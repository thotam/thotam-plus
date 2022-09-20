<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('khoaphong_sanpham_batbuocs', function (Blueprint $table) {
            $table->bigInteger('sanpham_id')->unsigned();
            $table->foreign('sanpham_id')->references('id')->on('product_lists')->onDelete('cascade')->onUpdate('cascade');
            $table->bigInteger('khoaphong_id')->unsigned();
            $table->primary(['sanpham_id', 'khoaphong_id'], 'sanpham_id_khoaphong_id_primary');
            $table->foreign('khoaphong_id')->references('id')->on('khoaphongs')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('khoaphong_sanpham_batbuocs');
    }
};
