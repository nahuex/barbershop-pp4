<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToInsumosTable extends Migration
{
    public function up()
    {
        Schema::table('insumos', function (Blueprint $table) {
            $table->unsignedBigInteger('lugar_insumo_id')->nullable();
            $table->foreign('lugar_insumo_id', 'lugar_insumo_fk_9735950')->references('id')->on('barbershops');
            $table->unsignedBigInteger('created_by_id')->nullable();
            $table->foreign('created_by_id', 'created_by_fk_9735955')->references('id')->on('users');
        });
    }
}
