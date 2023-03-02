<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLvTipepegawaiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peg.lv_tipepegawai', function (Blueprint $table) {
            $table->integer('tipepeg');
            $table->primary('tipepeg');
            $table->string('keterangansem')->nullable();
            $table->string('koderole')->nullable();
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
        Schema::dropIfExists('lv_tipepegawai');
    }
}
