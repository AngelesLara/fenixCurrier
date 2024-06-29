<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salidaenvio extends Model
{
    protected $primaryKey = 'ID_SalidaEnvio';

    protected $fillable = [
        'seHoraSalida', 'ID_Envio', 'ID_EncargadoTruck'
    ];

    public function salida()
    {
        return $this->belongsTo(Salida::class, 'ID_Salida');
    }

    public function envio()
    {
        return $this->belongsTo(Envio::class, 'ID_Envio');
    }

    public function encargadotruck()
    {
        return $this->belongsTo(Encargadotruck::class, 'ID_EncargadoTruck');
    }
}
