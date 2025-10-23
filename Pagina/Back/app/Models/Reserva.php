<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    use HasFactory;

    protected $table = 'reservas';

    protected $fillable = [
        'user_id',
        'vuelo_id',
        'asiento_id',
        'nombre_completo',
        'tipo_documento',
        'documento',
        'email',
        'celular',
        'metodo_id',
        'monto',
        'estado',
        'codigo',
        'cantidad_reserva'
    ];

    protected $hidden = [
        "created_at",
        "updated_at",
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function vuelo()
    {
        return $this->belongsTo(Vuelos::class);
    }

    public function asiento()
    {
        return $this->belongsTo(Asientos::class);
    }
}
