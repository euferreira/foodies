<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableEstabelecimento extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estabelecimento', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('cnpj');
            $table->string('endereco');
            $table->string('telefone');
            $table->string('razaoSocial');
            $table->string('cep');
            $table->boolean('aceitaReserva')->default(false);
            $table->integer('quantidadeMaximaReserva')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('table_estabelecimento');
    }
}
