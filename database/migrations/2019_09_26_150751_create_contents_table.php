<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contents', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->enum('tipo_contenido', [
                'beneficio',
                'consejo',
                'tema',
            ]);
            $table->unsignedBigInteger('orden');
            $table->string('titulo-contenido');

            $table->boolean('imagen_principal');
            $table->string('imagen_principal_titulo')->nullable();
            $table->binary('imagen_principal_url')->nullable();

            $table->boolean('texto_bajada');

            $table->string('texto_bajada_text')->nullable();

            $table->boolean('texto_principal');
            $table->string('texto_principal_titulo')->nullable();
            $table->string('texto_principal_text')->nullable();

            $table->boolean('galeria');
            $table->string('galeria_titulo')->nullable();
            $table->string('galeria_url')->nullable();

            $table->boolean('beneficio');
            $table->string('beneficio_como')->nullable();
            $table->string('beneficio_donde')->nullable();
            $table->string('beneficio_cuando')->nullable();
            $table->unsignedBigInteger('id_Rango')->nullable();

            $table->foreign('id_Rango')
                ->references('id')
                ->on('ranges')
                ->onDelete('cascade')
                ->onUpdate('cascade');

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
        Schema::dropIfExists('contents');
    }
}
