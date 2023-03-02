<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLvJabatanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peg.lv_jabatan', function (Blueprint $table) {
            $table->integer('idjabatan');
            $table->primary('idjabatan');
            $table->string('namajabatan')->nullable();
            $table->string('namasingkatjabatan')->nullable();
            $table->integer('eselon')->nullable();
            $table->char('jnsjabatan')->nullable()->comment('1 = Struktural, 2 = Fungsional');
            $table->string('t_updateuser')->nullable();
            $table->string('t_updateip')->nullable();
            $table->timestamp('t_updatetime');
            $table->timestamps();
            $table->string('t_updateact2')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lv_jabatan');
    }
}
