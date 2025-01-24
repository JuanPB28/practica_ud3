<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mantenimiento extends Model
{
    protected $table = 'mantenimientos';
    protected $fillable = ['id_usuario', 'id_equipo', 'observaciones'];
    public $timestamps = true;

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'id_usuario');
    }

    public function equipo()
    {
        return $this->belongsTo(Equipo::class, 'id_equipo');
    }

    public function operaciones()
    {
        return $this->belongsToMany(Operacion::class, 'operaciones_mantenimientos', 'id_mantenimiento', 'id_operacion');
    }
}
