<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salida extends Model
{
    use HasFactory;

    protected $primaryKey = 'ID_Salida';

    protected $fillable = [
        'seHoraSalida', 'ID_EncargadoTruck'
    ];

    public function envios()
    {
        return $this->belongsToMany(Envio::class, 'salidaenvios', 'ID_Salida', 'ID_Envio')->withTimestamps();
    }

    public function encargadotruck()
    {
        return $this->belongsTo(Encargadotruck::class, 'ID_EncargadoTruck');
    }
}
