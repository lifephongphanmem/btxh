<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHosothaydoitctxTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hosothaydoitctx', function (Blueprint $table) {
            $table->increments('id');
            $table->date('ngayyc')->nullable();
            $table->string('mahoso')->nullable();
            $table->string('hoten')->nullable();
            $table->date('ngaysinh')->nullable();
            $table->string('gioitinh')->nullable();
            $table->string('diachi')->nullable();
            $table->string('plthaydoi')->nullable();
            $table->string('noidungthaydoi')->nullable();

            $table->string('pltrocap')->nullable();
            $table->string('matrocap')->nullable();
            $table->string('heso')->nullable();
            $table->string('sotientc')->nullable();
            $table->string('pltrocapm')->nullable();
            $table->string('matrocapm')->nullable();
            $table->string('hesom')->nullable();
            $table->string('sotientcm')->nullable();

            $table->string('trangthaihoso')->nullable();
            $table->string('lydotralai')->nullable();
            $table->date('ngayhuong')->nullable();
            $table->string('qdhuong')->nullable();
            $table->string('maxa')->nullable();
            $table->string('mahuyen')->nullable();
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
        Schema::dropIfExists('hosothaydoitctx');
    }
}
