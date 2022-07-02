<?php

namespace App\Models;

class Estabelecimento extends \Illuminate\Database\Eloquent\Model
{
    protected $table = 'estabelecimento';
    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
