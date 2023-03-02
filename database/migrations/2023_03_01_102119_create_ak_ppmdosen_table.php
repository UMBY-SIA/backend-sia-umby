<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAkPpmdosenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peg.ak_ppmdosen', function (Blueprint $table) {
            $table->integer('noppm');
            $table->primary('noppm');
            $table->string('kdtipeppm',20);
            $table->string('nip',20);
            $table->string('periode',5);
            $table->string('judul');
            $table->integer('sks');
            $table->string('tempat',50);
            $table->integer('tahunkegiatan');
            $table->string('jurnal',50);
            $table->string('institusi',50);
            $table->string('keterangansem');
            $table->string('validator');
            $table->timestamp('waktuvalid');
            $table->string('t_updateuser');
            $table->string('t_updateip');
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
        Schema::dropIfExists('ak_ppmdosen');
    }
}
