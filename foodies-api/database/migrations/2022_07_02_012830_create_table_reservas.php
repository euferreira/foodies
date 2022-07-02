<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableReservas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->dateTime('dataHoraReserva');
            $table->integer('quantidade_pessoas');
            $table->unsignedBigInteger('usuarios_id');
            $table->unsignedBigInteger('local_id');
            $table->foreign('usuarios_id')->references('id')->on('usuarios');
            $table->foreign('local_id')->references('id')->on('locais');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('table_reservas');
    }
}
