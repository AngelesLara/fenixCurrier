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
        Schema::create('salidas', function (Blueprint $table) {
            $table->id('ID_Salida');
            $table->timestamp('seHoraSalida')->nullable();
            $table->unsignedBigInteger('ID_EncargadoTruck')->nullable();
            $table->timestamps();

            $table->foreign('ID_EncargadoTruck')->references('ID_EncargadoTruck')->on('encargadotrucks')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('salidas');
    }
};
