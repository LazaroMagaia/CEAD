<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso_disciplina extends Model
{
    use HasFactory;
    protected $fillable = ['disciplina_id','ano','curso_id'];

    public function curso()
    {
        return $this->belongsTo(Curso::class);
    }
    public function disciplina()
    {
        return $this->belongsTo(Disciplina::class);
    }
    

}
