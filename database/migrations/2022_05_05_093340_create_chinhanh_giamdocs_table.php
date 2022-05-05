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
        Schema::create('chinhanh_giamdocs', function (Blueprint $table) {
            $table->string('hr_key', 10);
            $table->foreign('hr_key')->references('key')->on('hrs')->onDelete('cascade')->onUpdate('cascade');
            $table->bigInteger('chinhanh_id')->unsigned();
            $table->primary(['hr_key', 'chinhanh_id']);
            $table->foreign('chinhanh_id')->references('id')->on('chinhanhs')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chinhanh_giamdocs');
    }
};
