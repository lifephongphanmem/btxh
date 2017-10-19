<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHosodexuattxTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hosodexuattx', function (Blueprint $table) {
            $table->increments('id');
            $table->date('ngaydexuat')->nullable();
            $table->string('mahoso')->nullable();
            $table->string('hoten')->nullable();
            $table->date('ngaysinh')->nullable();
            $table->string('diachi')->nullable();
            $table->string('pldexuat')->nullable();
            $table->string('nddexuat')->nullable();
            $table->string('trangthai')->nullable();
            $table->string('lydo')->nullable();
            $table->date('ngayhuong')->nullable();
            $table->string('qdhuong')->nullable();
            $table->string('sosotc')->nullable();
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
        Schema::dropIfExists('hosodexuattx');
    }
}
