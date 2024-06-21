<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiciosTable extends Migration
{
    public function up()
    {
        Schema::create('servicios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre_servicio');
            $table->decimal('precio_servicio', 15, 2);
            $table->time('duracion_servicio');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
