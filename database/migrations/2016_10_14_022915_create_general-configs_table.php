<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGeneralConfigsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('general-configs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('matinh')->nullable();
            $table->string('tentinh')->nullable();
            $table->string('donviquanly')->nullable();
            $table->string('diachitruso')->nullable();
            $table->string('dienthoai')->nullable();
            $table->string('fax')->nullable();
            $table->string('email')->nullable();
            $table->string('muctrocapchuan');
            $table->string('thutruong')->nullable();
            $table->string('ketoan')->nullable();
            $table->string('nguoilapbieu')->nullable();
            $table->text('setting')->nullable();
            $table->string('muctrocapchuan')->nullable();
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
        Schema::dropIfExists('general-configs');
    }
}
