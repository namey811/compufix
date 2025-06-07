<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('ingreso_equipos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cliente_id')->constrained('clientes')->onDelete('cascade');
            $table->foreignId('tipo_equipo_id')->constrained('tipo_equipos')->onDelete('cascade');
            $table->foreignId('marca_id')->constrained('marcas')->onDelete('cascade');
            $table->string('modelo');
            $table->string('serial')->nullable();
            $table->string('accesorios')->nullable();
            $table->text('falla_reportada');
            $table->date('fecha_ingreso');
            $table->enum('estado', ['Recibido', 'En Reparación', 'Reparado', 'Entregado'])->default('Recibido');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ingreso_equipos');
    }
};
