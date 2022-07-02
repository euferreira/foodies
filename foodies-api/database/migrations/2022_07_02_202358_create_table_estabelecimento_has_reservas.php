<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableEstabelecimentoHasReservas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estabelecimento_has_reservas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('estabelecimento_id');
            $table->unsignedBigInteger('reserva_id');
            $table->foreign('estabelecimento_id')->references('id')->on('estabelecimento');
            $table->foreign('reserva_id')->references('id')->on('reservas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('table_estabelecimento_has_reservas');
    }
}
