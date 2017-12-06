<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDistrictsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('districts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('mahuyen')->unique();
            $table->string('tenhuyen')->nullable();
            $table->string('diachi')->nullable();
            $table->string('dienthoai')->nullable();
            $table->string('fax')->nullable();
            $table->string('email')->nullable();
            $table->string('website')->nullable();
            $table->string('thutruong')->nullable();
            $table->string('ketoan')->nullable();
            $table->string('nguoithuchien')->nullable();
            $table->string('chucvuky')->nullable();
            $table->string('hotennguoiky')->nullable();
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
        Schema::dropIfExists('districts');
    }
}
