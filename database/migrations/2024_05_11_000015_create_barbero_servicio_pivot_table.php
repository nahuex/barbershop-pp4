<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarberoServicioPivotTable extends Migration
{
    public function up()
    {
        Schema::create('barbero_servicio', function (Blueprint $table) {
            $table->unsignedBigInteger('barbero_id');
            $table->foreign('barbero_id', 'barbero_id_fk_9730500')->references('id')->on('barberos')->onDelete('cascade');
            $table->unsignedBigInteger('servicio_id');
            $table->foreign('servicio_id', 'servicio_id_fk_9730500')->references('id')->on('servicios')->onDelete('cascade');
        });
    }
}
