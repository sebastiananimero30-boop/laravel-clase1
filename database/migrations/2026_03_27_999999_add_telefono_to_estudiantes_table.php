<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Agrega la columna 'telefono' a la tabla estudiantes.
     * Ejecutar con: php artisan migrate
     */
    public function up(): void
    {
        Schema::table('estudiantes', function (Blueprint $table) {
            // nullable() permite que estudiantes existentes no rompan la BD
            $table->string('telefono')->nullable()->after('email');
        });
    }

    /**
     * Revierte el cambio (elimina la columna).
     * Ejecutar con: php artisan migrate:rollback
     */
    public function down(): void
    {
        Schema::table('estudiantes', function (Blueprint $table) {
            $table->dropColumn('telefono');
        });
    }
};
