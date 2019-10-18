<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRangesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ranges', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('inicio');
            $table->integer('fin');
            $table->unsignedBigInteger('id_periodo')->nullable();
            $table->unsignedBigInteger('id_Subperiodo')->nullable();
            $table->foreign('id_periodo')
                ->references('id')
                ->on('periods')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('id_Subperiodo')
                ->references('id')
                ->on('subperiods')
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
        Schema::dropIfExists('ranges');
    }
}
