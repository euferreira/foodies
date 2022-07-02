<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservas extends Model
{
    protected $table = 'reservas';
    protected $dateFormat = 'Y-m-d H:i:s';
    protected $fillable = [
        'dataHoraReserva',
        'quantidade_pessoas',
        'usuarios_id',
        'local_id'
    ];
    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
