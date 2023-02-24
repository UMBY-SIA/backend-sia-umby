<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSoalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('log.soal', function (Blueprint $table) {
            $table->integer('idlog');
            $table->primary('idlog');
            $table->integer('kodekelas')->nullable();
            $table->integer('kodepertemuan')->nullable();
            $table->integer('type')->nullable();
            $table->string('t_updateip',30)->nullable();
            $table->timestamps();
            $table->string('t_updateact',30)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('soal');
    }
}
