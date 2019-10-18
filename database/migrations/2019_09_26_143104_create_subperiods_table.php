<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubperiodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subperiods', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->string('unidad');
            $table->timestamps();
        });
    }

    /**
     *  "id": 1,

     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subperiods');
    }
}
