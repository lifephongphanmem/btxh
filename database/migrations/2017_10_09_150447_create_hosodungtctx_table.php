<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHosodungtctxTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hosodungtctx', function (Blueprint $table) {
            $table->increments('id');
            $table->date('ngayxindung')->nullable();
            $table->string('mahoso')->nullable();
            $table->string('hoten')->nullable();
            $table->date('ngaysinh')->nullable();
            $table->string('diachi')->nullable();
            $table->string('nddungtc')->nullable();
            $table->string('trangthaihoso')->nullable();
            $table->string('lydotralai')->nullable();
            $table->string('ngaydunghuong')->nullable();
            $table->string('qddunghuong')->nullable();
            $table->string('lydodunghuong')->nullable();
            $table->string('pldunghuong')->nullable();
            $table->string('pltrocap')->nullable();
            $table->string('matrocap')->nullable();
            $table->string('sotientc')->nullable();
            $table->string('donviqd')->nullable();
            $table->string('diadanhqd')->nullable();
            $table->string('chucdanhqd')->nullable();
            $table->text('cancuqd')->nullable();
            $table->text('xettheototrinh')->nullable();
            $table->string('chucdanhkyqd')->nullable();
            $table->string('mahuyen')->nullable();
            $table->string('maxa')->nullable();
            $table->string('soqd')->nullable();
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
        Schema::dropIfExists('hosodungtctx');
    }
}
