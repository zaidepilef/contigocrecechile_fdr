<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePeriodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('periods', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->binary('url_imagen');
            $table->enum('tipo_periodo', [
                'crecimiento',
                'vacunas',
                'control_gestacion',
                'control_niño',
            ]);

           
            $table->enum('unidad', [
                'semana',
                'mes',
                'año',
            ]);

            $table->enum('estado', [
                'habilitado',
                'deshabilitado',
            ]);



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
        Schema::dropIfExists('periods');
    }
    
}
