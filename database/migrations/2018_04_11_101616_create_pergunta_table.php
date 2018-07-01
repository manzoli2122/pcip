<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePerguntaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pergunta', function (Blueprint $table) {
            $table->increments('id');

            $table->string('texto' , 2000);

            $table->text('resumo')->nullable();

            $table->unsignedInteger('assunto_id')->nullable();

            $table->unsignedInteger('resposta_certa_id')->nullable();

            $table->unsignedInteger('referencia_id')->nullable();

            $table->foreign('assunto_id')->references('id')->on('assunto')->onDelete('cascade');

           // $table->string('descricao')->nullable(); enum('Muito Dificil', 'Muito Facil', 'Dificil', 'F...    'Muito Dificil','Muito Facil','Dificil','Facil','Medio'
            
            $table->enum('dificuldade', ['Muito Dificil','Muito Facil','Dificil','Facil','Medio']);

            $table->enum('status', ['Criada','Validada','Suspensa']);


            $table->softDeletes();


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
        Schema::dropIfExists('pergunta');
    }
}
