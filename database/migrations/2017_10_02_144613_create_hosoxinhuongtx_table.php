<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHosoxinhuongtxTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hosoxinhuongtx', function (Blueprint $table) {
            $table->increments('id');
            $table->date('ngayxinhuong')->nullable();
            $table->string('mahoso')->nullable();
            $table->string('hoten')->nullable();
            $table->date('ngaysinh')->nullable();
            $table->string('diachi')->nullable();
            $table->string('ndxinhuong')->nullable();
            $table->string('trangthaihoso')->nullable();
            $table->string('lydotralai')->nullable();
            $table->date('ngayhuong')->nullable();
            $table->string('qdhuong')->nullable();
            $table->string('sosotc')->nullable();
            $table->string('plxinhuong')->nullable();
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
        Schema::dropIfExists('hosoxinhuongtx');
    }
}
