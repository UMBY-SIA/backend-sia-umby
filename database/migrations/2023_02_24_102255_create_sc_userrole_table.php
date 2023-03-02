<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScUserroleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gate.sc_userrole', function (Blueprint $table) {
            $table->string('kodeunit');
            $table->primary('kodeunit');
            $table->string('koderole');
            $table->unsignedInteger('userid')->nullable();
            $table->string('nip_nim')->nullable();
            $table->string('t_updateuser',30)->nullable();
            $table->string('t_updateip',30)->nullable();
            $table->timestamps();
            $table->string('t_updateact',30)->nullable();
            $table->foreign('koderole')->references('koderole')->on('gate.sc_role');
            $table->foreign('userid')->references('userid')->on('gate.sc_user');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sc_userrole');
    }
}
