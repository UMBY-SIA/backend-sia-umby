<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScRoleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gate.sc_role', function (Blueprint $table) {
            $table->string('koderole',25);
            $table->primary('koderole');
            $table->string('namarole',50)->nullable();
            $table->char('sistemkuliah');
            $table->string('t_updateuser',30)->nullable();
            $table->string('t_updateip',30)->nullable();
            $table->foreign('sistemkuliah')->references('sistemkuliah')->on('gate.sc_sistemkuliah');
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
        Schema::dropIfExists('sc_role');
    }
}
