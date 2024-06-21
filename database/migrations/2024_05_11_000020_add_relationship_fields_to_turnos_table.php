<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToTurnosTable extends Migration
{
    public function up()
    {
        Schema::table('turnos', function (Blueprint $table) {
            $table->unsignedBigInteger('cliente_turno_id')->nullable();
            $table->foreign('cliente_turno_id', 'cliente_turno_fk_9735405')->references('id')->on('clientes');
            $table->unsignedBigInteger('barbershop_turno_id')->nullable();
            $table->foreign('barbershop_turno_id', 'barbershop_turno_fk_9735561')->references('id')->on('barbershops');
            $table->unsignedBigInteger('barbero_turno_id')->nullable();
            $table->foreign('barbero_turno_id', 'barbero_turno_fk_9735657')->references('id')->on('barberos');
            $table->unsignedBigInteger('servicio_turno_id')->nullable();
            $table->foreign('servicio_turno_id', 'servicio_turno_fk_9735892')->references('id')->on('servicios');
            $table->unsignedBigInteger('created_by_id')->nullable();
            $table->foreign('created_by_id', 'created_by_fk_9735409')->references('id')->on('users');
        });
    }
}
