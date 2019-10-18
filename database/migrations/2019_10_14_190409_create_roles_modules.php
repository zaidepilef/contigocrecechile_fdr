<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolesModules extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles_modules', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('rol_id')->nullable();
            $table->unsignedBigInteger('module_id')->nullable();
           
            $table->foreign('rol_id')
                ->references('id')
                ->on('roles_users')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('module_id')
                ->references('id')
                ->on('modules_system')
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
        Schema::dropIfExists('roles_modules');
    }
}
