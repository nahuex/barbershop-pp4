<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarberosTable extends Migration
{
    public function up()
    {
        Schema::create('barberos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre_barbero');
            $table->string('correo_barbero');
            $table->integer('telefono_barbero');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
