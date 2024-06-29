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
        Schema::create('empleados', function (Blueprint $table) {
            $table->id('ID_Empleado');
            $table->string('empCodigo')->unique();
            $table->string('empNombre');
            $table->string('empTelefono');
            $table->string('empEmail');
            $table->string('empDireccion');
            $table->string('empCargo');
            $table->decimal('empSueldo', 8,2);
            $table->tinyInteger('empEstado')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empleados');
    }
};
