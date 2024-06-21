<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToHerramientaTable extends Migration
{
    public function up()
    {
        Schema::table('herramienta', function (Blueprint $table) {
            $table->unsignedBigInteger('lugar_herramienta_id')->nullable();
            $table->foreign('lugar_herramienta_id', 'lugar_herramienta_fk_9735893')->references('id')->on('barbershops');
            $table->unsignedBigInteger('created_by_id')->nullable();
            $table->foreign('created_by_id', 'created_by_fk_9735782')->references('id')->on('users');
        });
    }
}
