<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePePenghargaanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peg.pe_penghargaan', function (Blueprint $table) {
            $table->string('pe_penghargaan');
            $table->primary('pe_penghargaan');
            $table->integer('nopenghargaan');
            $table->string('namapenghargaan')->nullable();
            $table->integer('tahun')->nullable();
            $table->string('namainstansi')->nullable();
            $table->string('t_updateuser2')->nullable();
            $table->string('t_updateip')->nullable();
            $table->timestamp('t_updatetime2')->nullable();
            $table->string('t_updateact2')->nullable();
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
        Schema::dropIfExists('pe_penghargaan');
    }
}
