<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Operacion extends Model
{
    protected $table = 'operaciones';
    protected $fillable = ['nombre', 'descripcion'];
    public $timestamps = false;

    public function mantenimientos()
    {
        return $this->belongsToMany(Mantenimiento::class, 'operaciones_mantenimientos', 'id_operacion', 'id_mantenimiento');
    }
}
