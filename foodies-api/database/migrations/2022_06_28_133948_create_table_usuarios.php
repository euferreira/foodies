<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableUsuarios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nome', 100);
            $table->string('email', 100)->unique();
            $table->string('password');
            $table->string('telefone', 14);
            $table->boolean('ativo')->default(false);
            $table->unsignedBigInteger('origem_id');
            $table->foreign('origem_id')->references('id')->on('origem');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuarios');
    }
}
