<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Registros extends Model
{
    protected $fillable = ['nombre','correo','codigo','cursos_id'];

    public function cursos(){
        return $this->hasMany(Cursos::class,'cursos_id');
    }
}
