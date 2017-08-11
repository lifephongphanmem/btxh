<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTcdoituongtxctTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tcdoituongtxct', function (Blueprint $table) {
            $table->increments('id');
            $table->string('matrocap')->nullable();
            $table->string('mahoso')->nullable();
            $table->string('hoten')->nullable();
            $table->string('diachi')->nullable();
            $table->string('namsinh')->nullable();
            $table->string('qdhuong')->nullable();
            $table->text('noidung')->nullable();
            $table->string('chitiet')->nullable();
            $table->string('heso')->nullable();
            $table->string('sotientc')->nullable();
            $table->string('tltungay')->nullable();
            $table->string('tldenngay')->nullable();
            $table->string('thangtl')->nullable();
            $table->string('sotientl')->nullable();
            $table->string('hientrang')->nullable();
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
        Schema::dropIfExists('tcdoituongtxct');
    }
}
