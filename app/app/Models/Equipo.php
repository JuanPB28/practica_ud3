<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
    protected $table = 'equipos';
    protected $fillable = ['aula', 'mesa'];
    public $timestamps = false;

    public function fichaTecnica()
    {
        return $this->hasOne(FichaTecnica::class, 'id_equipo');
    }

    public function mantenimientos()
    {
        return $this->hasMany(Mantenimiento::class, 'id_equipo');
    }
}
