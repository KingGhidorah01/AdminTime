<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actividad extends Model
{
    use HasFactory;

    protected $table = 'actividades';

    protected $fillable = ["nombre", "descripcion", "horaInicio", "horaFin", "dias_id"];

    public $timestamps = false;

    public function diasRel()
    {
        return $this->hasMany(Dia::class, 'id', 'dias_id');
    }


}
