<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssuntoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assunto', function (Blueprint $table) {
            $table->increments('id');

            $table->string('nome' , 500 );

            $table->unsignedInteger('disciplina_id');

            $table->foreign('disciplina_id')->references('id')->on('disciplina')->onDelete('cascade');

            $table->string('descricao', 500)->nullable();

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

        Schema::dropIfExists('assunto');
    }
}
