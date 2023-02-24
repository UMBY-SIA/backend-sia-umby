<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUpdateindeksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('log.updateindeks', function (Blueprint $table) {
            $table->integer('idupdateindeks');
            $table->primary('idupdateindeks');
            $table->string('nim',20)->nullable();
            $table->string('periode',5)->nullable();
            $table->string('periodenilai',5)->nullable();
            $table->boolean('jenis')->nullable();
            $table->integer('sks')->nullable();
            $table->integer('nsks')->nullable();
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
        Schema::dropIfExists('updateindeks');
    }
}
