<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDsdoituongtxTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dsdoituongtx', function (Blueprint $table) {
            $table->increments('id');
            $table->string('matinh')->nullable();
            $table->string('mahuyen')->nullable();
            $table->string('maxa')->nullable();
            $table->string('trangthaihoso')->nullable();
            $table->string('lydotralai')->nullable();
            $table->string('ttthaotac')->nullable();

            $table->string('mahoso')->nullable();
            $table->string('hoten')->nullable();
            $table->date('ngaysinh')->nullable();
            $table->string('gioitinh')->nullable();
            $table->string('dantoc')->nullable();
            $table->string('quequan')->nullable();
            $table->string('diachi')->nullable();
            $table->string('socmnd')->nullable();
            $table->string('bhyt')->nullable();
            $table->string('noikhambenh')->nullable();

            $table->string('ttquyetdinh')->nullable();
            $table->string('trangthaihuong')->nullable();
            $table->string('sosotc')->nullable();
            $table->string('pltrocap')->nullable();
            $table->string('matrocap')->nullable();
            $table->date('ngayhuong')->nullable();
            $table->string('ngaydunghuong')->nullable();
            $table->string('lydodunghuong')->nullable();

            $table->string('ipt1')->nullable();
            $table->string('ipf1')->nullable();
            $table->string('ipt2')->nullable();
            $table->string('ipf2')->nullable();
            $table->string('ipt3')->nullable();
            $table->string('ipf3')->nullable();
            $table->string('ipt4')->nullable();
            $table->string('ipf4')->nullable();
            $table->string('ipt5')->nullable();
            $table->string('ipf5')->nullable();
            $table->string('ipt6')->nullable();
            $table->string('ipf6')->nullable();
            $table->string('ipt7')->nullable();
            $table->string('ipf7')->nullable();
            $table->string('ipt8')->nullable();
            $table->string('ipf8')->nullable();
            $table->string('ipt9')->nullable();
            $table->string('ipf9')->nullable();
            $table->string('ipt10')->nullable();
            $table->string('ipf10')->nullable();
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
        Schema::dropIfExists('dsdoituongtx');
    }
}
