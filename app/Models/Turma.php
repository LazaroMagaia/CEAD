<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Curso;
use App\Models\Estudante;
class Turma extends Model
{
    use HasFactory;
    protected $fillable=["nome","ano","curso_id"];

    public function curso(){
        return $this->belongsTo(Curso::class);
    }
    public function estudantes(){
        return $this->belongsToMany(Estudante::class);
    }
    
}
