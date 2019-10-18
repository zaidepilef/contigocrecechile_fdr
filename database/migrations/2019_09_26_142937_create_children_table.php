<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChildrenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('children', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->string('fecha_nacimiento')->nullable();
            $table->string('fecha_concepcion')->nullable();
            $table->enum('sexo', [
                'hombre',
                'mujer',
            ]);
            $table->enum('estado', [
                'nacio',
                'gestacion',
                'nonacio',
            ]);

            $table->unsignedBigInteger('id_user_app')->nullable();

            $table->foreign('id_user_app')
                ->references('id')
                ->on('user_apps')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     *
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('children');
    }
}
