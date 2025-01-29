<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoEquipo extends Model
{
    protected $table = 'tipos_equipos';
    protected $fillable = ['nombre', 'descripcion'];
    public $timestamps = false;

    public function equipos()
    {
        return $this->hasMany(Equipo::class);
    }
}
