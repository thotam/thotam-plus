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
        Schema::create('khoaphongs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->longText('name')->nullable()->default(null);
            $table->integer('order')->nullable()->default(null);
            $table->boolean('active')->nullable()->default(null);
            $table->longText('ghichu')->nullable()->default(null);
            $table->string('hr_key', 20);
            $table->unsignedBigInteger('created_by')->nullable()->default(null);
            $table->unsignedBigInteger('updated_by')->nullable()->default(null);
            $table->unsignedBigInteger('deleted_by')->nullable()->default(null);
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('hr_key')->references('key')->on('hrs')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('khoaphongs');
    }
};
