<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarbershopsTable extends Migration
{
    public function up()
    {
        Schema::create('barbershops', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre_barbershop');
            $table->string('direccion_barbershop');
            $table->integer('telefono_barbershop');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
