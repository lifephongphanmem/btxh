<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTcdoituongtxTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tcdoituongtx', function (Blueprint $table) {
            $table->increments('id');
            $table->string('matinh')->nullable();
            $table->string('mahuyen')->nullable();
            $table->string('maxa')->nullable();
            $table->string('trangthai')->nullable();
            $table->string('thang')->nullable();
            $table->string('nam')->nullable();
            $table->string('tengoitc')->nullable();
            $table->string('pltrocap')->nullable();
            $table->string('matrocap')->nullable();
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
        Schema::dropIfExists('tcdoituongtx');
    }
}
