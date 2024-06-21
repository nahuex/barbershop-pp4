<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHerramientaTable extends Migration
{
    public function up()
    {
        Schema::create('herramienta', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre_herramienta');
            $table->integer('unidad_herramienta');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
