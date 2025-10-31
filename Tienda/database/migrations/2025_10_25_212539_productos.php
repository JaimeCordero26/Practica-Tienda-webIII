<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * Crea la tabla 'productos' con columnas y restricciones básicas.
     */
    public function up(): void
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id(); // BIGINT auto-increment PK
            $table->string('nombre', 120); // nombre del producto (máx 120 chars)
            $table->decimal('precio', 10, 2); // precio con precisión 10, escala 2
            $table->boolean('adquirido')->default(false); // estado adquirido (0/1)
            $table->timestamps(); // created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     * Elimina la tabla si existe (rollback).
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
