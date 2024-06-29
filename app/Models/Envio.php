<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Envio extends Model
{
    use HasFactory;

    protected $primaryKey = 'ID_Envio';

    protected $fillable = [
        'envCodigo', 'envDescripcion', 'envFecha_Llegada', 'envTotal', 'envPagoCon', 'envMetodoPago', 'envEstado', 'ID_DestinoR', 'ID_DestinoD', 'ID_User'
    ];


    public function user()
    {
        return $this->belongsTo(User::class, 'ID_User');
    }

    public function destinoR()
    {
        return $this->belongsTo(Destino::class, 'ID_DestinoR');
    }

    public function destinoD()
    {
        return $this->belongsTo(Destino::class, 'ID_DestinoD');
    }

    public function paquetes()
    {
        return $this->hasMany(Paquete::class, 'ID_Envio');
    }

    public function salidas()
    {
        return $this->belongsToMany(Salida::class, 'salidaenvios', 'ID_Envio', 'ID_Salida')->withTimestamps();
    }

    public function clientes()
    {
        return $this->belongsToMany(Cliente::class)->withTimestamps()->withPivot('ecNombre');
    }
}
