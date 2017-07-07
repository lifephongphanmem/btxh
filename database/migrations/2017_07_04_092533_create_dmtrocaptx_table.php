<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDmtrocaptxTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dmtrocaptx', function (Blueprint $table) {
            $table->increments('id');
            $table->string('pltrocap')->nullable();//NXH,CD,CSBTXH
            $table->string('ttqd')->nullable();
            $table->string('dieu')->nullable();
            $table->string('khoan')->nullable();
            $table->string('matrocap')->nullable();
            $table->text('noidung')->nullable();
            $table->string('chitiet')->nullable();
            $table->string('heso')->nullable();
            $table->string('ghichu')->nullable();
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
        Schema::dropIfExists('dmtrocaptx');
    }
}
