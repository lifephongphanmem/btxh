<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaubieutokhaiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maubieutokhai', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tieude')->nullable();
            $table->string('noidung')->nullable();
            $table->date('ngaybanhanh')->nullable();
            $table->date('ngayapdung')->nullable();
            $table->string('file')->nullable();
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
        Schema::dropIfExists('maubieutokhai');
    }
}
