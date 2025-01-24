<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FichaTecnica extends Model
{
    protected $table = 'fichas_tecnicas';
    protected $fillable = ['id_equipo', 'num_serie', 'marca', 'modelo', 'so', 'componentes'];
    public $timestamps = true;

    public function equipo()
    {
        return $this->belongsTo(Equipo::class, 'id_equipo');
    }
}
