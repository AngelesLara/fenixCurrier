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
        Schema::create('envios', function (Blueprint $table) {
            $table->id('ID_Envio');
            $table->string('envCodigo', 30)->unique();
            $table->string('envDescripcion', 255);
            $table->date('envFecha_Llegada');
            $table->decimal('envTotal', 10, 2);
            $table->decimal('envPagoCon', 10, 2)->default(0);
            $table->string('envMetodoPago', 50);
            $table->tinyInteger('envEstado')->default(1);
            $table->unsignedBigInteger('ID_DestinoR')->nullable();
            $table->unsignedBigInteger('ID_DestinoD')->nullable();
            $table->unsignedBigInteger('ID_User')->nullable();
            $table->timestamps();

            $table->foreign('ID_DestinoR')->references('ID_Destino')->on('destinos')->onDelete('set null');
            $table->foreign('ID_DestinoD')->references('ID_Destino')->on('destinos')->onDelete('set null');
            $table->foreign('ID_User')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('envios');
    }
};
