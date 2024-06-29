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
        Schema::create('salidaenvios', function (Blueprint $table) {
            $table->id('ID_SalidaEnvio');
            $table->unsignedBigInteger('ID_Salida');
            $table->unsignedBigInteger('ID_Envio');
            $table->timestamps();

            $table->foreign('ID_Salida')->references('ID_Salida')->on('salidas')->onDelete('cascade');
            $table->foreign('ID_Envio')->references('ID_Envio')->on('envios')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('salidaenvios');
    }
};
