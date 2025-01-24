<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table = 'usuarios';
    protected $fillable = ['nombre', 'email'];
    public $timestamps = false;

    public function mantenimientos()
    {
        return $this->hasMany(Mantenimiento::class, 'id_usuario');
    }
}
