<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiclesTable extends Migration
{
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->string('placa', 20)->unique();
            $table->string('marca', 100);
            $table->string('modelo', 100)->nullable();
            $table->smallInteger('anio')->nullable();
            // client fields (embedded as requested)
            $table->string('cliente_nombre', 100);
            $table->string('cliente_apellidos', 150)->nullable();
            $table->string('cliente_documento', 50);
            $table->string('cliente_email', 150)->nullable();
            $table->string('cliente_telefono', 50)->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('vehicles');
    }
}
