<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
    protected $table = 'equipos';
    protected $fillable = ['id_tipo_equipo', 'aula', 'mesa'];
    public $timestamps = false;

    public function tipoEquipo()
    {
        return $this->belongsTo(TipoEquipo::class, 'id_tipo_equipo');
    }

    public function fichaTecnica()
    {
        return $this->hasOne(FichaTecnica::class, 'id_equipo');
    }

    public function mantenimientos()
    {
        return $this->hasMany(Mantenimiento::class, 'id_equipo');
    }

    public function incidencias()
    {
        return $this->hasMany(Incidencia::class, 'id_equipo');
    }
}
