<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaxireciboClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maxirecibo_clientes', function (Blueprint $table) {
            $table->id();
            $table->string('documento', 20);
            $table->string('nome', 300)->nullable();
            $table->string('logradouro', 200)->nullable();
            $table->string('numero', 10)->nullable();
            $table->string('complemento', 100)->nullable();
            $table->string('bairro', 100)->nullable();
            $table->string('cep', 10)->nullable();
            $table->string('ie_rg', 15)->nullable();
            $table->string('site', 200)->nullable();
            $table->string('municipio', 300)->nullable();
            $table->string('uf', 10)->nullable();
            $table->string('fone', 20)->nullable();
            $table->string('email', 100)->nullable();
            $table->datetime('data_cadastro', 20)->nullable();
            $table->string('email_fatura', 200)->nullable();
            $table->string('serial', 255)->nullable();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('maxirecibo_clientes');
    }
}
