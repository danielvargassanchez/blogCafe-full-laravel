<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cursos extends Model
{
    protected $fillable = ['titulo','fecha','cupo','precio','imgCurso'];
    public function registros(){
        return $this->belongsTo(Registros::class);
    }
}
