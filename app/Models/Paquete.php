<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paquete extends Model
{
    use HasFactory;

    protected $primaryKey = 'ID_Paquete';

    protected $fillable = [
        'paqCodigo', 'paqDescripcion', 'paqCantidad', 'paqPrecio', 'paqPeso', 'paqTamaño', 'paqEstado', 'ID_Envio'
    ];


    public function envio()
    {
        return $this->belongsTo(Envio::class, 'ID_Envio');
    }
}