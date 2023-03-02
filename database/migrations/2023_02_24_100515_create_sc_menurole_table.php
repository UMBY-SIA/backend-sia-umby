<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScMenuroleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gate.sc_menurole', function (Blueprint $table) {
            $table->string('koderole');
            $table->integer('idmenu');
            $table->primary('idmenu');
            $table->string('aksesmenu',10)->nullable();
            $table->integer('caninsert')->nullable();
            $table->integer('canupdate')->nullable();
            $table->integer('candelete')->nullable();
            $table->foreign('koderole')->references('koderole')->on('gate.sc_role');
            $table->string('t_updateuser',30)->nullable();
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
        Schema::dropIfExists('sc_menurole');
    }
}
